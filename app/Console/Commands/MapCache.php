<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Logics\LocationLogic;
use App\Logics\MapLogic;
use App\Models\BiBrand;
use App\Models\BiChannel;
use App\Models\BiCustomer;
use App\Models\BiDeviceType;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\BiScene;
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

        //$brands = BiBrand::getAllBrandIds();
        $customers = BiCustomer::getAllIds();
        $channels = BiChannel::getAllChannelIds();
        //$ebikeTypes = BiEbikeType::getAllIds();
        $scenes = BiScene::getAllIds();
        $deviceTypes = BiDeviceType::getAllIds();

        $this->cacheData([0], null, DeviceObject::CACHE_ALL_PRE);//全部
        //$this->cacheData($brands, 'brand_id', DeviceObject::CACHE_CUSTOMER_PRE);//品牌
        $this->cacheData($customers, 'customer_id', DeviceObject::CACHE_CUSTOMER_PRE);//品牌
        $this->cacheData($channels, 'channel_id', DeviceObject::CACHE_CHANNEL_PRE);//渠道
        //$this->cacheData($ebikeTypes, 'ebike_type_id', DeviceObject::CACHE_SCENE_PRE);//车型
        $this->cacheData($scenes, 'scene_id', DeviceObject::CACHE_SCENE_PRE);//场景
        $this->cacheData($deviceTypes, 'device_type', DeviceObject::CACHE_DEVICE_TYPE_PRE);//设备型号

        $this->chmodCache0777();
    }

    private function cacheData($ids, $whereName = null, $keyPre)
    {
        $cacheTime = Carbon::now()->addDay();
        foreach ($ids as $id) {

            $model = TDeviceCode::getDeviceModel();

            if ($id && $whereName) {
                $where = [$whereName => $id];
            } else {
                $where = [];
            }
            $model->where($where);
            //$all = [];
            $riding = [];
            $park = [];
            $offlineLess48 = [];
            $offlineMore48 = [];
            $storage = [];
            $channelStorage = [];
            $this->batchSearch($model, function ($deviceCode) use (&$channelStorage, &$riding, &$park, &$offlineMore48, &$offlineLess48, &$storage) {
                static $t = 0;
                /** @var TDeviceCode $deviceCode */
                $imei = $deviceCode->imei;
                $udid = $deviceCode->qr;

                echo "processing imei:$imei,udid:$udid...\n";
                echo ++$t . ".......\n";
                $this->getMaxCache();

                //过滤没有定位的
                if (!DeviceLogic::getLastLocationInfo($imei)) {
                    return [];
                }
                DeviceLogic::clear();

                //$all[] = $udid;

                if($deviceCode->device_cycle == TDeviceCode::DEVICE_CYCLE_INUSE){
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
                }


                //库存
                if ($deviceCode->device_cycle == TDeviceCode::DEVICE_CYCLE_STORAGE) {
                    $storage[] = $udid;
                }elseif($deviceCode->device_cycle == TDeviceCode::DEVICE_CYCLE_CHANNEL_STORAGE){
                    $channelStorage[] = $udid;
                }

            });

            $cacheKeyPre = DeviceObject::CACHE_MAP_PRE . $keyPre;
            $map = [
                TDeviceCode::DEVICE_CYCLE_STORAGE,//库存
                TDeviceCode::DEVICE_CYCLE_CHANNEL_STORAGE,//渠道库存
                DeviceObject::CACHE_LIST_RIDING,
                DeviceObject::CACHE_LIST_PARK,
                DeviceObject::CACHE_LIST_OFFLINE_LESS_48,
                DeviceObject::CACHE_LIST_OFFLINE_MORE_48,
            ];
            $map2 = [
                $storage,
                $channelStorage,
                $riding,
                $park,
                $offlineLess48,
                $offlineMore48,
            ];


            foreach ($map as $t => $k) {
                $data = [];
                if ($map2[$t]) {
                    foreach ($map2[$t] as $udid) {
                        $this->getMaxCache();
                        $loc = MapLogic::getMapLoc($udid);
                        DeviceLogic::clear();
                        $loc && $data[] = $loc;
                    }
                }
                $count = count($data);
                Log::debug("file put $cacheKeyPre-$id-$k , count:$count success");
                echo "file put $cacheKeyPre-$id-$k ,  count:$count  success" . "\n";
                Cache::store('file')->put($cacheKeyPre . $id . $k, $data, $cacheTime);
                unset($data);
            }

        }
    }

}