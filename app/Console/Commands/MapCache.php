<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Logics\LocationLogic;
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

class MapCache extends BaseCommand
{

    protected $signature = 'map:cache';
    protected $description = '缓存地图定位';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $brands = BiBrand::getAllBrandIds();
        $channels = BiChannel::getAllChannelIds();

        $this->cacheData([0],null, DeviceObject::CACHE_ALL_PRE);//全部
        $this->cacheData($brands, 'brand_id', DeviceObject::CACHE_BRAND_PRE);//品牌
        $this->cacheData($channels, 'channel_id', DeviceObject::CACHE_CHANNEL_PRE);//渠道

        chmod(storage_path(), 0777);
    }

    private function cacheData($ids, $whereName = null, $keyPre)
    {
        $cacheTime = Carbon::now()->addDay();
        foreach ($ids as $id) {
            $model = TDeviceCode::getDeviceModel();
            if($whereName){
                $where = [$whereName => $id];
            }else{
                $where = [];
            }
            $model->where($where);
            $all = $riding = $park = $offlineLess48 = $offlineMore48 = $storage = [];
            $this->batchSearch($model, function ($deviceCode) use (&$all, &$riding, &$park, &$offlineMore48, &$offlineLess48, &$storage) {
                static $t = 0;
                /** @var TDeviceCode $deviceCode */
                $imei = $deviceCode->imei;
                $udid = $deviceCode->qr;

                echo "processing imei:$imei,udid:$udid...\n";
                echo ++$t . ".......\n";
                echo memory_get_usage() . "---------------\n";

                $all[] = $udid;

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

                //库存
                if ($deviceCode->device_cycle == TDeviceCode::DEVICE_CYCLE_STORAGE) {
                    $storage[] = $udid;
                }

            });

            $cacheKeyPre = DeviceObject::CACHE_MAP_PRE . $keyPre;
            $map = [
                TDeviceCode::DEVICE_CYCLE_ALL,//全部
                TDeviceCode::DEVICE_CYCLE_STORAGE,//库存
                DeviceObject::CACHE_LIST_RIDING,
                DeviceObject::CACHE_LIST_PARK,
                DeviceObject::CACHE_LIST_OFFLINE_LESS_48,
                DeviceObject::CACHE_LIST_OFFLINE_MORE_48,
            ];
            $map2 = [
                &$all,
                &$riding,
                &$park,
                &$offlineLess48,
                &$offlineMore48,
                &$storage,
            ];

            foreach ($map as $k) {
                foreach ($map2 as $rows) {
                    $data = [];
                    foreach ($rows as $udid) {
                        $data[] = $this->getLoc($udid);
                    }
                    $count = count($data);
                    Log::debug("file put $cacheKeyPre . $id . $k , count:$count success");
                    echo "file put $cacheKeyPre . $id . $k ,  count:$count  success" . "\n";
                    Cache::store('file')->put($cacheKeyPre . $id . $k, $data, $cacheTime);
                    unset($data);
                }

            }

        }
    }

    private function getLoc($udid)
    {
        $gps = DeviceLogic::getLastLocationInfoByUdid($udid);
        DeviceLogic::clear();
        if (!$gps['time']) {
            return [];
        }
        $data = [
            'name' => $udid,
            'value' => [
                floatval($gps['lng']),
                floatval($gps['lat']),
                1,//数量
            ],
            'time' => date('Y-m-d H:i', $gps['time']),
            'address' => $gps['address'] ?: '无',
        ];
        return $data;
    }

}