<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Logics\LocationLogic;
use App\Models\BiBrand;
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

class DeviceAddress extends BaseCommand
{

    protected $signature = 'device:address';
    protected $description = '设备地址更新';

    public function __construct()
    {

        parent::__construct();
    }


    public function handle()
    {

        $provinceMap = BiProvince::getAllProvinceMap();
        $provinceMap = array_flip($provinceMap);

        $model = TDeviceCode::getDeviceModel();
        $this->batchSearch($model, function (TDeviceCode $deviceCode) use ($provinceMap){
            static $t = 0;
            $imei = $deviceCode->imei;

            echo ++$t . '------------------' . $imei . "\n";

            $loc = DeviceLogic::getLastLocationInfo($imei);
            if($loc['address']){
                if(preg_match('/^[^省市区]+[省市区]/u', $loc['address'], $match)){
                    $province = $match[0];
                    if(isset($provinceMap[$province])){
                        $deviceCode->pid = $provinceMap[$province];
                        $deviceCode->save();
                    }
                }
            }
            return [];
        });
    }
}