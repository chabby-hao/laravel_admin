<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Libs\UpiotApi;
use App\Logics\DeviceLogic;
use App\Logics\LocationLogic;
use App\Models\BiActiveCityDevice;
use App\Models\BiActiveDevice;
use App\Models\BiBrand;
use App\Models\BiCardDatum;
use App\Models\BiCardLiangxun;
use App\Models\BiChannel;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\BiProvince;
use App\Models\TDevice;
use App\Models\TDeviceCategory;
use App\Models\TDeviceCategoryDicNew;
use App\Models\TDeviceCode;
use App\Objects\DeviceObject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpiotSync extends BaseCommand
{

    protected $signature = 'upiot:sync';
    protected $description = '流量统计脚本';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        //$this->cardListSync();

        $this->cardDataUsageSync();

    }

    private function cardListSync()
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

    private function cardDataUsageSync()
    {
        $model = BiCardLiangxun::where([]);

        $upiotApi = new UpiotApi();
        $date = Carbon::yesterday()->format('Ymd');

        $msisdns = [];
        $this->batchSearch($model, function (BiCardLiangxun $row) use ($upiotApi, &$msisdns, $date) {

            $msisdns[] = $row->msisdn;

            if(count($msisdns) <= 100){
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

    private function dataUsage(UpiotApi $upiotApi, $msisdns, $date)
    {
        //异步获取
        $upiotApi->getDataUsageAsync($msisdns, $date, function($data) use ($date){
            $this->dataUsageDbUpdate($data, $date);
        });
    }

    private function dataUsageDbUpdate($data, $date)
    {
        echo json_encode($data) . "\n";
        if($data['data']){
            foreach ($data['data'] as $item){
                BiCardLiangxun::updateOrCreate([
                    'msisdn'=>$item['msisdn'],
                ],[
                    'current_date_usage'=>$item['current_date_usage'],
                ]);

                BiCardDatum::updateOrCreate([
                    'msisdn'=>$item['msisdn'],
                    'date'=>$date,
                ],[
                    'data_usage'=>$item['data_usage'],
                ]);

            }
        }
    }

}