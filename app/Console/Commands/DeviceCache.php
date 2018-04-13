<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Models\BiBrand;
use App\Models\BiChannel;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\TDevice;
use App\Models\TDeviceCategory;
use App\Models\TDeviceCategoryDicNew;
use App\Models\TDeviceCode;
use App\Objects\DeviceObject;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeviceCache extends BaseCommand
{


    protected $signature = 'device:cache';
    protected $description = '缓存设备id';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $this->cacheDeviceObj();
        $this->cacheDeviceStatus();
    }

    private function cacheDeviceObj()
    {
        $model = TDeviceCode::getDeviceModel();

        $this->batchSearch($model, function($deviceCode){
            /** @var TDeviceCode $deviceCode */
            $imei = $deviceCode->imei;
            $udid = $deviceCode->qr;
            $deviceObj = DeviceLogic::createDevice($imei);
            echo "processing imei:$imei,udid:$udid...\n";
            Cache::set(DeviceObject::CACHE_OBJ_PRE . $imei, $deviceObj);
        });
        echo "end";
    }

    /**
     * 同步骑行，停车，离线状态
     */
    private function cacheDeviceStatus()
    {
        $model = TDeviceCode::getDeviceModel();

        $riding = [];
        $park = [];
        $offlineLess48 = [];
        $offlineMore48 = [];
        $this->batchSearch($model, function ($deviceCode) use(&$riding, &$park, &$offlineMore48, &$offlineLess48) {

            /** @var TDeviceCode $deviceCode */
            $imei = $deviceCode->imei;
            $udid = $deviceCode->qr;
            echo "processing imei:$imei,udid:$udid...\n";
            if(DeviceLogic::isOnline($imei)){
                if(DeviceLogic::isTurnOn($imei)){
                    //骑行
                    $riding[] = $udid;
                }else{
                    //停车
                    $park[] = $udid;
                }
            }else{
                if(DeviceLogic::isContanct($imei, 48 * 3600)){
                    //离线小于48小时
                    $offlineLess48[] = $udid;
                }else{
                    //离线大于48小时
                    $offlineMore48[] = $udid;
                }
            }

        });
        Cache::set(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_RIDING, $riding);
        Cache::set(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_PARK, $park);
        Cache::set(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_OFFLINE_LESS_48, $offlineLess48);
        Cache::set(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_OFFLINE_MORE_48, $offlineMore48);

        Log::info('riding  -- ',   $riding);
        Log::info('park  -- ',   $park);
        Log::info('offline<48  -- ',   $offlineLess48);
        Log::info('offline>48  -- ',   $offlineMore48);

        echo "end";
    }

}