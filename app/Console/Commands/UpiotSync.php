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

        $this->cardInfoSync();

    }

    private function cardListSync()
    {
        $upiot = new UpiotApi();
        $upiot->cardListSync(function($data){
            $this->getMaxCache();
            foreach ($data as $row){
                BiCardLiangxun::firstOrCreate([
                    'msisdn'=>$row['msisdn'],
                ],[
                    'iccid'=>$row['iccid'],
                    'imsi'=>$row['imsi'],
                ]);
            }
        });
    }

    private function cardInfoSync()
    {
        $model = BiCardLiangxun::where([]);

        $upiotApi = new UpiotApi();

        $this->batchSearch($model, function (BiCardLiangxun $row) use ($upiotApi) {

            echo "{$row->imsi} processing \n";

            if(!$row->imsi){
                return [];
            }
            //PS:imsi 是从4开头，device_code 这张表存的前面都多带个9，我也不晓得为啥.

            //异步获取
            $upiotApi->getCardInfoAsync($row->imsi, function($cardInfo){
                echo json_encode($cardInfo) . "\n";
                BiCardLiangxun::updateOrCreate([
                    'imsi'=>$cardInfo['imsi'],
                ], $cardInfo);
            });
            if($upiotApi->promiseCount() >= 20){
                $upiotApi->clearPromise();
            }
            sleep(3);
        });
        $upiotApi->clearPromise();
    }

    private function cardDataUsageSync()
    {
        $model = BiCardLiangxun::where([]);

        $upiotApi = new UpiotApi();
        //$date = Carbon::now()->previousWeekday()->format('Ymd');
        $date = '20180826';

        $msisdns = [];
        $this->batchSearch($model, function (BiCardLiangxun $row) use ($upiotApi, &$msisdns, $date) {

            $msisdns[] = $row->msisdn;

            if(count($msisdns) <= 20){
                return [];
            }

            //异步获取
            $upiotApi->getDataUsageAsync($msisdns, $date, function($data) use ($date){
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
            });
            if($upiotApi->promiseCount() >= 20){
                $upiotApi->clearPromise();
            }
            $msisdns = [];
            sleep(3);
        });
        $upiotApi->clearPromise();
    }


}