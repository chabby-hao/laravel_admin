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

    protected $signature = 'upiot:sync {--date=}';
    protected $description = '流量统计脚本';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        $this->cardListSyncByDb();

        $this->cardListSync();

        $this->cardDataUsageSync();

    }

    protected function cardListSyncByDb()
    {
        $date = Carbon::today()->format('Ym');
        var_dump($date);

        //已销号的查不出流量
        $model = BiCardLiangxun::where('account_status','!=','04');

        $upiotApi = new UpiotApi();

        $msisdns = [];
        $call = function($data){
            if($data['data']){
                foreach ($data['data'] as $item){
                    unset($item['carrier']);
                    BiCardLiangxun::updateOrCreate([
                        'imsi'=>$item['imsi'],
                    ],$item);
                }
            }
        };
        $this->batchSearch($model, function (BiCardLiangxun $row) use ($upiotApi, &$msisdns, $date, $call) {

            $msisdns[] = $row->msisdn;

            if(count($msisdns) <= 49){
                return [];
            }

            //异步获取
            $upiotApi->cardListSyncByDb($msisdns, $date, $call);
            if($upiotApi->promiseCount() >= 20){
                $upiotApi->clearPromise();
            }
            $msisdns = [];
            sleep(3);
            return [];
        });
        //异步获取
        $upiotApi->cardListSyncByDb($msisdns, $date, $call);
        $upiotApi->clearPromise();
    }

    protected function cardListSync()
    {
        $upiot = new UpiotApi();
        $upiot->cardListSync(function($data){

            $this->getMaxCache();

            foreach ($data as $row){
                BiCardLiangxun::updateOrCreate([
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
        $date = $this->option('date');
        $date or $date = Carbon::today()->subDays(1)->format('Ymd');
        var_dump($date);
        $this->cardDataUsage($date);
    }

    protected function cardDataUsage($date)
    {
        //已销号的查不出流量
        $model = BiCardLiangxun::where('account_status','!=','04');

        $upiotApi = new UpiotApi();
        //$date = Carbon::yesterday()->format('Ymd');

        $msisdns = [];
        $this->batchSearch($model, function (BiCardLiangxun $row) use ($upiotApi, &$msisdns, $date) {

            $msisdns[] = $row->msisdn;

            if(count($msisdns) <= 80){
                return [];
            }

            //异步获取
            $this->dataUsage($upiotApi, $msisdns, $date);
            if($upiotApi->promiseCount() >= 20){
                $upiotApi->clearPromise();
            }
            $msisdns = [];
            sleep(3);
            return [];
        });
        //异步获取
        $this->dataUsage($upiotApi, $msisdns, $date);
        $upiotApi->clearPromise();
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
                Cache::store('redis')->put($this->getKey($item['msisdn'], $date), $item['data_usage'], 60 * 48);
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