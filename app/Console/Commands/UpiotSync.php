<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Libs\UpiotApi;
use App\Logics\DeviceLogic;
use App\Logics\LocationLogic;
use App\Models\BiActiveCityDevice;
use App\Models\BiActiveDevice;
use App\Models\BiBrand;
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

        $this->cardListSync();

        exit;


        $model = TDeviceCode::getDeviceModel();

        $upiotApi = new UpiotApi();

        $this->batchSearch($model, function (TDeviceCode $deviceCode) use ($upiotApi) {

            echo "{$deviceCode->imei} processing \n";

            if(!$deviceCode->imsi){
                return [];
            }
            //imsi 是从4开头，device_code 这张表存的前面都多带个9，我也不晓得为啥.
            $imsi = substr($deviceCode->imsi, 1);

            //异步获取
            $upiotApi->getCardInfoAsync($imsi, function($cardInfo){
                echo json_encode($cardInfo) . "\n";
                BiCardLiangxun::updateOrCreate([
                    'imsi'=>$cardInfo['imsi'],
                ], $cardInfo);
            });
            sleep(3);
        });


    }

    private function cardListSync()
    {
        $upiot = new UpiotApi();
        $upiot->cardListSyncAsync(function($data){
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


}