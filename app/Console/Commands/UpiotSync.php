<?php

namespace App\Console\Commands;


use App\Libs\UpiotApi;
use App\Models\BiCardDatum;
use App\Models\BiCardLiangxun;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UpiotSync extends BaseCommand
{

    const CACHE_KEY_PRE = 'pre_data_usage:';

    protected $signature = 'upiot:sync';
    protected $description = '流量统计脚本';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        $this->cardListSync();

        $this->cardDataUsageSync();

    }

    protected function cardListSync()
    {
        $upiot = new UpiotApi();
        $upiot->cardListSync(function($data){

            $this->getMaxCache();

            foreach ($data as $row){
                BiCardLiangxun::firstOrCreate([
                    'imsi'=>$row['imsi'],
                ],$row);
            }
        });
    }

    /**
     * 流量日明细同步，因为没有日明细接口，所以，用昨日的月流量-前日的月流量=昨日的日流量
     */
    protected function cardDataUsageSync()
    {
        $predate = Carbon::today()->subDays(3)->format('Ymd');
        $date = Carbon::today()->subDays(2)->format('Ymd');
        $this->cardDataUsage($predate,[$this, 'dataUsageDbUpdate']);
        $this->cardDataUsage($date,[$this, 'dataUsageDbUpdate']);

    }

    protected function cardDataUsage($date, $call)
    {
        //已销号的查不出流量
        $model = BiCardLiangxun::where('account_status','!=','04');

        $upiotApi = new UpiotApi();
        //$date = Carbon::yesterday()->format('Ymd');

        $msisdns = [];
        $this->batchSearch($model, function (BiCardLiangxun $row) use ($upiotApi, &$msisdns, $date, $call) {

            $msisdns[] = $row->msisdn;

            if(count($msisdns) <= 80){
                return [];
            }

            //异步获取
            call_user_func($call, $upiotApi, $msisdns, $date);
            //$this->dataUsage($upiotApi, $msisdns, $date);
            if($upiotApi->promiseCount() >= 20){
                $upiotApi->clearPromise();
            }
            $msisdns = [];
            sleep(3);
            return [];
        });
        //异步获取
        call_user_func($call, $upiotApi, $msisdns, $date);
        $upiotApi->clearPromise();
    }

    protected function twoDayAgoDataUsage(UpiotApi $upiotApi, $msisdns, $date)
    {
        //异步获取
        $upiotApi->getDataUsageAsync($msisdns, $date, function ($data) use ($date) {
            if ($data['data']) {
                foreach ($data['data'] as $item) {
                    Cache::store('redis')->put($this->getKey($item['msisdn'], $date), $item['data_usage'], 60 * 24);
                }
            }
        });
    }

    protected function getKey($msisdn, $date)
    {
        return self::CACHE_KEY_PRE . $date . $msisdn;
    }

    protected function dataUsage(UpiotApi $upiotApi, $msisdns, $date)
    {
        //异步获取
        $upiotApi->getDataUsageAsync($msisdns, $date, function ($data) use ($date) {
            $this->dataUsageDbUpdate($data, $date);
        });
    }

    protected function dataUsageDbUpdate($data, $date)
    {
        $predate = Carbon::parse($date)->subDay(1)->format('Ymd');
        if($data['data']){
            foreach ($data['data'] as $item){
                Cache::store('redis')->put($this->getKey($item['msisdn'], $date), $item['data_usage'], 60 * 24);
                $preUsage = Cache::store('redis')->get($this->getKey($item['msisdn'], $predate));

                if($preUsage === null){
                    continue;
                }

                $diff = $item['data_usage'] - $preUsage;
                $dataUsage = $diff > 0 ? $diff : 0;
                BiCardLiangxun::updateOrCreate([
                    'msisdn'=>$item['msisdn'],
                ],[
                    'current_date_usage'=>$dataUsage,
                ]);

                BiCardDatum::updateOrCreate([
                    'msisdn'=>$item['msisdn'],
                    'date'=>$date,
                ],[
                    'data_usage'=>$dataUsage,
                ]);

            }
        }
    }

}