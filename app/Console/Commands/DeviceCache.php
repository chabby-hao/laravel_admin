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
        $this->cacheOnlineDevices();
        $this->chmodCache0777();
        $this->cacheDeviceCycle();
        $this->chmodCache0777();
        $this->cacheDeviceStatus();
        $this->chmodCache0777();
    }

    /**
     * 刷新上过线的设备
     */
    private function cacheOnlineDevices()
    {
        $model = TDeviceCode::getDeviceModelHasType();

        $this->batchSearch($model, function ($deviceCode) {
            /** @var TDeviceCode $deviceCode */
            $imei = $deviceCode->imei;
            $udid = $deviceCode->qr;
            echo "processing imei:$imei,udid:$udid...\n";
            $isNeverOnline = DeviceLogic::isDeviceNerverOnline($imei);
            if(!$isNeverOnline && $deviceCode->device_cycle == TDeviceCode::DEVICE_CYCLE_ALL){
                $deviceCode->device_cycle = TDeviceCode::DEVICE_CYCLE_STORAGE;//库存
                $deviceCode->save();
            }
        });
        //$time = Carbon::now()->addDay();
        //Cache::put(DeviceObject::CACHE_ONLINE, $ids, $time);
        echo "end";
    }

    /**
     * 同步骑行，停车，离线状态
     */
    private function cacheDeviceStatus()
    {
        $model = TDeviceCode::getDeviceModel();

        $count = $model->count();
        Log::debug('cacheDeviceStatus count :' . $count);

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
            $sid = $deviceCode->sid;

            //跳过从未上线的设备
            /*if (DeviceLogic::isDeviceNerverOnline($imei)) {
                return [];
            }*/

            //缓存设备
            DeviceLogic::simpleCreateDevice($imei);
            DeviceLogic::clear();

            echo "processing imei:$imei,udid:$udid...\n";
            echo ++$t . ".......\n";
            if (DeviceLogic::isOnline($imei)) {
                if (DeviceLogic::isTurnOn($imei)) {
                    //骑行
                    $riding[] = $sid;
                } else {
                    //停车
                    $park[] = $sid;
                }
            } else {
                if (DeviceLogic::isContanct($imei, 48 * 3600)) {
                    //离线小于48小时
                    $offlineLess48[] = $sid;
                } else {
                    //离线大于48小时
                    $offlineMore48[] = $sid;
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

        echo "count " . count($riding) . '--' . count($park) . '--' . count($offlineLess48) . '--' . count($offlineMore48) . "\n";

        echo "end";
    }

    private function cacheDeviceCycle()
    {

        $map = TDeviceCode::getCycleMap();
        foreach ($map as $key => $cycleName) {
            $model = TDeviceCode::getDeviceModel();
            if (!$key) {
                $where = [];
            } else {
                $where = ['device_cycle' => $key];
            }
            $model->where($where);
            $count = $model->count();

            Log::debug("cacheDeviceCycle key=$key, count=$count");

            $ids = $model->select(['sid','qr'])->get()->toArray();
            if ($ids) {
                $ids = Helper::transToOneDimensionalArray($ids, 'sid');
            }
            //缓存数量
            Cache::store('file')->put(DeviceObject::CACHE_LIST_COUNT_PRE . $key, $count, Carbon::now()->addMinutes(DeviceLogic::DEVICE_CACHE_MINUTES));
            //缓存udid
            Cache::store('file')->put(DeviceObject::CACHE_LIST_PRE . $key, $ids, Carbon::now()->addMinutes(DeviceLogic::DEVICE_CACHE_MINUTES));
            echo "processing cycle: $cycleName, key: $key, count: $count \n";
        }

        echo 'end' . "\n";
    }

}