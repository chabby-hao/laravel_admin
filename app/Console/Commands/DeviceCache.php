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
use Carbon\Carbon;
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
        //$this->cacheDeviceObj();
        $this->cacheDeviceStatus();
        $this->cacheDeviceCycle();
    }

    private function cacheDeviceObj()
    {
        $model = TDeviceCode::getDeviceModel();

        $this->batchSearch($model, function ($deviceCode) {
            /** @var TDeviceCode $deviceCode */

            echo memory_get_usage() . "\n";
            $imei = $deviceCode->imei;
            $udid = $deviceCode->qr;
            DeviceLogic::createDevice($imei);
            DeviceLogic::clear();
            echo "processing imei:$imei,udid:$udid...\n";
            //Cache::set(DeviceObject::CACHE_OBJ_PRE . $imei, $deviceObj);
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
        //$all = [];
        $this->batchSearch($model, function ($deviceCode) use (&$riding, &$park, &$offlineMore48, &$offlineLess48) {
            static $t = 0;
            /** @var TDeviceCode $deviceCode */
            $imei = $deviceCode->imei;
            $udid = $deviceCode->qr;

            //缓存设备
            DeviceLogic::simpleCreateDevice($imei);
            DeviceLogic::clear();

            echo "processing imei:$imei,udid:$udid...\n";
            echo ++$t .".......\n";
            if (DeviceLogic::isOnline($imei)) {
                if (DeviceLogic::isTurnOn($imei)) {
                    //骑行
                    $riding[] = $udid;
                } else {
                    //停车
                    $park[] = $udid;
                }
            } else {
                if (DeviceLogic::isContanct($imei, 48 * 3600)) {
                    //离线小于48小时
                    $offlineLess48[] = $udid;
                } else {
                    //离线大于48小时
                    $offlineMore48[] = $udid;
                }
            }
            //$all[] = $udid;

        });
        $carbon = Carbon::now()->addMinutes(DeviceLogic::DEVICE_CACHE_MINUTES);
        Cache::store('file')->put(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_RIDING, $riding, $carbon);
        Cache::store('file')->put(DeviceObject::CACHE_LIST_COUNT_PRE . DeviceObject::CACHE_LIST_RIDING, count($riding), $carbon);
        Cache::store('file')->put(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_PARK, $park, $carbon);
        Cache::store('file')->put(DeviceObject::CACHE_LIST_COUNT_PRE . DeviceObject::CACHE_LIST_PARK, count($park), $carbon);
        Cache::store('file')->put(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_OFFLINE_LESS_48, $offlineLess48, $carbon);
        Cache::store('file')->put(DeviceObject::CACHE_LIST_COUNT_PRE . DeviceObject::CACHE_LIST_OFFLINE_LESS_48, count($offlineLess48), $carbon);
        Cache::store('file')->put(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_OFFLINE_MORE_48, $offlineMore48, $carbon);
        Cache::store('file')->put(DeviceObject::CACHE_LIST_COUNT_PRE . DeviceObject::CACHE_LIST_OFFLINE_MORE_48, count($offlineMore48), $carbon);

        //Cache::store('file')->put(DeviceObject::CACHE_LIST_PRE . DeviceObject::CACHE_LIST_ALL, $all, $carbon);
        //Cache::store('file')->put(DeviceObject::CACHE_LIST_COUNT_PRE . DeviceObject::CACHE_LIST_ALL, count($all), $carbon);

        Log::info('riding  -- ', $riding);
        Log::info('park  -- ', $park);
        Log::info('offline<48  -- ', $offlineLess48);
        Log::info('offline>48  -- ', $offlineMore48);

        echo "count " . count($riding) . count($park) . count($offlineLess48) . count($offlineMore48);

        echo "end";
    }

    private function cacheDeviceCycle()
    {
        $model = TDeviceCode::getDeviceModel();
        $map = TDeviceCode::getCycleMap();
        foreach ($map as $key => $cycleName){
            $count = $model->whereDeviceCycle($key)->count();
            $udids = $model->whereDeviceCycle($key)->select('qr')->get()->toArray();
            if($udids){
                $udids = Helper::transToOneDimensionalArray($udids, 'qr');
            }
            //缓存数量
            Cache::store('file')->put(DeviceObject::CACHE_LIST_COUNT_PRE . $key, $count, Carbon::now()->addMinutes(DeviceLogic::DEVICE_CACHE_MINUTES));
            //缓存udid
            Cache::store('file')->put(DeviceObject::CACHE_LIST_PRE . $key, $udids, Carbon::now()->addMinutes(DeviceLogic::DEVICE_CACHE_MINUTES));
            echo "processing cycle: $cycleName, key: $key, count: $count \n";
        }

        echo 'end' . "\n";
    }

}