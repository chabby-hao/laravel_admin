<?php

namespace App\Logics;

use App\Libs\Helper;
use App\Models\BiBrand;
use App\Models\BiCardLiangxun;
use App\Models\BiChannel;
use App\Models\BiCustomer;
use App\Models\BiDeliveryDevice;
use App\Models\BiDeviceType;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\BiScene;
use App\Models\TChipMileage;
use App\Models\TDevice;
use App\Models\TDeviceCategory;
use App\Models\TDeviceCategoryDicNew;
use App\Models\TDeviceCode;
use App\Models\TDeviceFootmark;
use App\Models\TDeviceSetLog;
use App\Models\TEvCharge;
use App\Models\TEvDay;
use App\Models\TEvMileage;
use App\Models\TEvMileageGp;
use App\Models\TEvSituation;
use App\Models\TEvVoltage;
use App\Models\TInsureOrder;
use App\Models\TInsureType;
use App\Models\TLockLog;
use App\Models\TPayment;
use App\Models\TPaymentOrder;
use App\Models\TStepCounter;
use App\Models\TStepHour;
use App\Models\TStepProperty;
use App\Models\TUser;
use App\Models\TUserDevice;
use App\Models\TUserMsg;
use App\Models\TVersionUpdateInfo;
use App\Models\TZoneMsg;
use App\Objects\DeviceObject;
use App\Objects\FaultObject;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class DeviceLogic extends BaseLogic
{

    const DEVICE_CACHE_MINUTES = 60 * 24;//缓存时间

    private static $devices = [];//imei=>deviceObject

    private static $imeisToUdids = [];//imei=>udid

    private static $imeiToImsi = [];//imei=>imsi

    public static function clear()
    {
        RedisLogic::clear();
        self::$devices = [];
        self::$imeisToUdids = [];
        self::$imeiToImsi = [];
    }

    public static function getDevices()
    {
        return self::$devices;
    }

    public static function getDevice($imei)
    {
        if (isset(self::$devices[$imei])) {
            return self::$devices[$imei];
        }
        return false;
    }

    public static function getDeviceByUdid($udid)
    {
        $imei = static::getImei($udid);
        return static::getDevice($imei);
    }

    /**
     * 简单创建设备对象，主要用于定时脚本
     * @param $imei
     * @return DeviceObject
     */
    public static function simpleCreateDevice($imei)
    {
        $device = new DeviceObject();
        $udid = static::getUdid($imei);
        $device->setUdid($udid);
        $device->setImei($imei);
        //$device->setProductType(static::getProductTypeByUdid($udid));
        //$device->setProductTypeName(static::getProductTypeNameByUdid($udid));
        //$device->setDeviceType(static::getDeviceTypeByUdid($udid));
        //$device->setDeviceTypeName(static::getDeviceTypeNameByUdid($udid));
        //$device->setEbikeTypeId(static::getEbikeTypeIdByUdid($udid));
        //$device->setEbikeTypeName(static::getEbikeTypeNameByUdid($udid));
        //$device->setBrandId(static::getBrandIdByUdid($udid));
        //$device->setBrandName(static::getBrandNameByUdid($udid));
        //$device->setChannelId(static::getChannelIdByUdid($udid));
        //$device->setChannelName(static::getChannelNameByUdid($udid));
        //$device->setDeliverdAt(static::getDeliverdAtByUdid($udid));
        //$device->setRegisterAt(static::getRegisterAtByUdid($udid));
        $device->setActiveAt(static::getActiveAtByUdid($udid));
        $device->setIsOnline(static::isOnline($imei) ? DeviceObject::ONLINE : DeviceObject::OFFLINE);
        $device->setIsOnlineTrans($device->getisOnline() ? '在线' : '离线');
        $device->setIsContact(static::isContanct($imei) ? 1 : 0);
        //$device->setIsContactTrans($device->getisContact() ? '在联' : '失联');
        $loc = static::getLastLocationInfo($imei);
        if ($loc) {
            $device->setLat($loc['lat']);
            $device->setLng($loc['lng']);
            $device->setAddress($loc['address']);
            $device->setLastGps(static::getLastGps($imei));
        }
        //$device->setGsm(static::getGsm($imei));
        //$device->setChipPower(static::getChipPower($imei));
        //$device->setCharge(static::isBatteryConnect($imei) ? 1 : 0);
        //$device->setChargeTrans($device->getCharge() ? '在位' : '断开');
        //$device->setVoltage(static::getCurrentVoltage($imei));//0.1v
        //$device->setBatteryCount(static::getBatteryCount($imei));
        //$device->setBatterySpecification($device->getBatteryCount() * 12);//多少V的电池
        //$device->setBattery(static::getBattery($imei));
        //$device->setExpectMile(static::getExpectMile($imei));
        $device->setTurnon(static::isTurnOn($imei) ? DeviceObject::SWITCH_STATUS_TURNON : DeviceObject::SWITCH_STATUS_TURNOFF);
        $device->setTurnonTrans($device->getTurnon() === DeviceObject::SWITCH_STATUS_TURNON ? '开' : '关');
        $device->setLastContact(static::getLastContact($imei));
        //$device->setIsLock(static::isLock($imei) ? DeviceObject::LOCK : DeviceObject::UNLOCK);
        //$device->setIsLockTrans($device->getisLock() === DeviceObject::LOCK ? '已锁' : '未锁');
        $device->setDeviceCycle(static::getDeviceCycleByUdid($udid));
        $device->setDeviceCycleTrans(TDeviceCode::getCycleMap($device->getDeviceCycle()));
        $device->setEbikeStatus(self::getDeviceStatus($device));//设备状态,骑行，停车,etc...
        //self::$devices[$imei] = $device;
        //同时缓存数据
        Cache::store('file')->put(DeviceObject::CACHE_OBJ_PRE . $imei, $device, Carbon::now()->addMinutes(self::DEVICE_CACHE_MINUTES));
        return $device;
    }

    /**
     * 工厂模式生成1个数据,同时缓存
     * @param $imei
     * @return DeviceObject
     */
    public static function createDevice($imei)
    {
        $device = new DeviceObject();
        $udid = static::getUdid($imei);
        $device->setUdid($udid);
        $device->setImei($imei);
        $device->setProductType(static::getProductTypeByUdid($udid));
        $device->setProductTypeName(static::getProductTypeNameByUdid($udid));
        $device->setDeviceType(static::getDeviceTypeByUdid($udid));
        $device->setDeviceTypeName(static::getDeviceTypeNameByUdid($udid));
        $device->setEbikeTypeId(static::getEbikeTypeIdByUdid($udid));
        $device->setEbikeTypeName(static::getEbikeTypeNameByUdid($udid));
        $device->setBrandId(static::getBrandIdByUdid($udid));
        $device->setBrandName(static::getBrandNameByUdid($udid));
        $device->setChannelId(static::getChannelIdByUdid($udid));
        $device->setChannelName(static::getChannelNameByUdid($udid));
        $device->setCustomerId(static::getCustomerIdByUdid($udid));
        $device->setCustomerName(static::getCustomerNameByUdid($udid));
        $device->setSceneId(static::getSceneIdByUdid($udid));
        $device->setSceneName(static::getSceneNameByUdid($udid));
        $device->setDeliverdAt(static::getDeliverdAtByUdid($udid));
        $device->setRegisterAt(static::getRegisterAtByUdid($udid));
        $device->setActiveAt(static::getActiveAtByUdid($udid));
        $device->setIsOnline(static::isOnline($imei) ? 1 : 0);
        $device->setIsOnlineTrans($device->getisOnline() ? '在线' : '离线');
        $device->setIsContact(static::isContanct($imei) ? 1 : 0);
        $device->setIsContactTrans($device->getisContact() ? '在联' : '失联');
        $loc = static::getLastLocationInfo($imei);
        if ($loc) {
            $device->setLat($loc['lat']);
            $device->setLng($loc['lng']);
            $device->setAddress($loc['address']);
            $device->setLastGps(static::getLastGps($imei));
        }
        $device->setGsm(static::getGsm($imei));
        $device->setChipPower(static::getChipPower($imei));
        $device->setCharge(static::isBatteryConnect($imei) ? 1 : 0);
        $device->setChargeTrans($device->getCharge() ? '在位' : '断开');
        $device->setVoltage(static::getCurrentVoltage($imei));//0.1v
        $device->setBatteryCount(static::getBatteryCount($imei));
        $device->setBatterySpecification($device->getBatteryCount() * 12);//多少V的电池
        $device->setBattery(static::getBattery($imei));
        $device->setExpectMile(static::getExpectMile($imei));
        $device->setTurnon(static::isTurnOn($imei) ? DeviceObject::SWITCH_STATUS_TURNON : DeviceObject::SWITCH_STATUS_TURNOFF);
        $device->setTurnonTrans($device->getTurnon() === DeviceObject::SWITCH_STATUS_TURNON ? '开' : '关');
        $device->setLastContact(static::getLastContact($imei));
        $device->setIsLock(static::isLock($imei) ? DeviceObject::LOCK : DeviceObject::UNLOCK);
        $device->setIsLockTrans($device->getisLock() === DeviceObject::LOCK ? '已锁' : '未锁');
        $device->setDeviceCycle(static::getDeviceCycleByUdid($udid));
        $device->setDeviceCycleTrans(TDeviceCode::getCycleMap($device->getDeviceCycle()));
        $device->setEbikeStatus(self::getDeviceStatus($device));//设备状态,骑行，停车,etc...
        self::$devices[$imei] = $device;
        //同时缓存数据
        //Cache::store('file')->put(DeviceObject::CACHE_OBJ_PRE . $imei, $device, Carbon::now()->addMinutes(self::DEVICE_CACHE_MINUTES));
        return $device;
    }

    private static function getDeviceStatus(DeviceObject $deviceObj)
    {

        /*if(!$deviceObj->getActiveAt()){
            return '';
        }*/

        if ($deviceObj->getisOnline()) {
            if ($deviceObj->getTurnon() === DeviceObject::SWITCH_STATUS_TURNON) {
                $deviceStatus = '骑行';
            } else {
                $deviceStatus = '停车';
            }
        } else {
            if ($deviceObj->getisContact()) {
                $deviceStatus = '离线<48h';
            } else {
                $deviceStatus = '离线>48h';
            }
        }
        return $deviceStatus;
    }

    /**
     * @param $udid
     * @return DeviceObject
     */
    public static function createDeviceByUdid($udid)
    {
        $imei = static::getImei($udid);
        return static::createDevice($imei);
    }

    public static function getDeviceFromCacheByUdid($udid)
    {
        $imei = self::getImei($udid);
        return Cache::store('file')->get(DeviceObject::CACHE_OBJ_PRE . $imei);
    }

    public static function getUdid($imei)
    {
        if (!$imei) {
            return false;
        }
        if (isset(self::$imeisToUdids[$imei])) {
            return self::$imeisToUdids[$imei];
        }
        $deviceCode = TDeviceCode::whereImei($imei)->first();
        if ($deviceCode) {
            $udid = $deviceCode->qr;
            if (!$udid) {
                return false;
            }
            self::$imeisToUdids[$imei] = $udid;
            return $udid;
        } else {
            return false;
        }
    }

    public static function getImei($udid)
    {
        if (!$udid) {
            return false;
        }
        $udidsToImeis = array_flip(self::$imeisToUdids);
        if (isset($udidsToImeis[$udid])) {
            return $udidsToImeis[$udid];
        }

        $deviceCode = TDeviceCode::whereQr($udid)->first();
        if ($deviceCode) {
            $imei = $deviceCode->imei;
            if (!$imei) {
                return false;
            }
            self::$imeisToUdids[$imei] = $udid;
            return $imei;
        } else {
            return false;
        }
    }

    public static function getUdidImei($udidOrImei)
    {
        if ($imei = self::getImei($udidOrImei)) {
            return [$udidOrImei, $imei];
        } elseif ($udid = self::getUdid($udidOrImei)) {
            return [$udid, $udidOrImei];
        } else {
            return false;
        }
    }

    public static function getImsi($imei)
    {
        if (isset(self::$imeiToImsi[$imei])) {
            return self::$imeiToImsi[$imei];
        }
        $deviceCode = TDeviceCode::whereImei($imei)->first();
        if ($deviceCode) {
            $imsi = $deviceCode->imsi;
            self::$imeiToImsi[$imei] = $imsi;
            return $imsi;
        } else {
            return false;
        }
    }

    public static function getUdidByMsisdn($msisdn)
    {
        if($card = BiCardLiangxun::whereMsisdn($msisdn)->first()){
            var_dump($card->imsi);
            $imsi = '9' . $card->imsi;
            if($deviceCode = TDeviceCode::whereImsi($imsi)->first()){
                var_dump($deviceCode->qr);
                return $deviceCode->qr;
            }
        }
        return false;
    }

    public static function getUdidByImsi($imsi)
    {
        $deviceCode = TDeviceCode::whereImsi($imsi)->first();
        if ($deviceCode) {
            $udid = $deviceCode->qr;
            return $udid;
        } else {
            return false;
        }
    }

    public static function getUdidByName($name)
    {
        $device = TDevice::whereName($name)->first();
        if ($device) {
            $udid = $device->udid;
            return $udid;
        } else {
            return false;
        }
    }

    public static function getNameByUdid($udid)
    {
        $device = TDevice::whereUdid($udid)->first();
        if ($device) {
            $name = $device->name ?: $device->udid;
            return $name;
        } else {
            return $udid;
        }
    }

    public static function getChassisByUdid($udid)
    {
        $device = TDevice::whereUdid($udid)->first();
        if ($device) {
            $chassis = $device->chassis ?: '';
            return $chassis;
        } else {
            return '';
        }
    }

    public static function getDeviceCycleByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->device_cycle;
        });
    }

    private static function deviceCodeCallBack($udid, $func)
    {
        $deviceCode = TDeviceCode::getByUdid($udid);
        if ($deviceCode) {
            return $func($deviceCode);
        } else {
            return '';
        }
    }

    /**
     * 是否使用001B的逻辑，001C的逻辑和001B的逻辑在有些地方不一样
     * @param $udid
     * @return bool
     */
    public static function isEb001b($udid)
    {
        $deviceType = self::getProductTypeByUdid($udid);
        if (!in_array($deviceType, [BiProductType::PRODUCT_TYPE_EB001C, BiProductType::PRODUCT_TYPE_EB001A, BiProductType::PRODUCT_TYPE_EB001, BiProductType::PRODUCT_TYPE_UNKNOWN])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $udid
     * @return string
     */
    public static function getDeviceTypeByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->device_type;
        });
    }

    /**
     * @param $udid
     * @return string
     */
    public static function getDeviceTypeNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $data = BiDeviceType::find($deviceCode->device_type);
            return $data ? $data->name : '';
        });
    }

    public static function getProductTypeByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->model;
        });
    }

    /**
     * @param $udid
     * @return string
     */
    public static function getProductTypeNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $productType = BiProductType::find($deviceCode->model);
            return $productType ? $productType->product_name : BiProductType::getNameMap(BiProductType::PRODUCT_TYPE_EB001);
        });
    }

    public static function getEbikeTypeIdByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->ebike_type_id;
        });
    }

    public static function getEbikeTypeNameByUdid($udid)
    {

        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $ebikeTypeName = BiEbikeType::find($deviceCode->ebike_type_id);
            return $ebikeTypeName ? $ebikeTypeName->ebike_name : '';
        });
    }

    public static function getBrandId($imei)
    {
        $udid = self::getUdid($imei);
        return self::getBrandIdByUdid($udid);
    }

    public static function getBrandIdByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->brand_id;
        });
    }

    public static function getBrandName($imei)
    {
        $udid = self::getUdid($imei);
        return self::getBrandNameByUdid($udid);
    }

    public static function getBrandNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $brand = BiBrand::find($deviceCode->brand_id);
            return $brand ? $brand->brand_name : '';
        });
    }

    public static function getChannelIdByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->channel_id;
        });
    }

    public static function getChannelName($imei)
    {
        $udid = self::getUdid($imei);
        return self::getChannelNameByUdid($udid);
    }

    public static function getChannelNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $channel = BiChannel::find($deviceCode->channel_id);
            return $channel ? $channel->channel_name : '';
        });
    }

    public static function getCustomerIdByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->customer_id;
        });
    }

    public static function getCustomerNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $val = BiCustomer::find($deviceCode->customer_id);
            return $val ? $val->customer_name : '';
        });
    }

    public static function getSceneIdByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->scene_id;
        });
    }

    public static function getSceneNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $val = BiScene::find($deviceCode->scene_id);
            return $val ? $val->scenes_name : '';
        });
    }

    /**
     * 获取出货时间 Y-m-d H:i:s
     * @param $udid
     * @return string
     */
    public static function getDeliverdAtByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) use($udid) {
            if ($deviceCode->delivered_at) {
                return Carbon::parse($deviceCode->delivered_at)->toDateTimeString();
            } else {
                $row = DB::connection('care_log')->selectOne("select * from t_device_category where udid='$udid'");
                return $row && $row->delivered_ts ? $row->delivered_ts : '';
            }
        });
    }

    /**
     * 获取设备码生成时间 Y-m-d H:i:s
     * @param $udid
     * @return string
     */
    public static function getRegisterAtByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->register ? $deviceCode->register->toDateTimeString() : '';
        });
    }

    public static function getActiveAtByUdid($udid, $format = 'Y-m-d')
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) use ($format) {
            if ($deviceCode->active) {
                return Carbon::createFromTimestamp($deviceCode->active)->format($format);
            } else {
                return '';
            }
        });
    }

    public static function isOnlineByUdid($udid, $delay = 1800)
    {
        $imei = self::getImei($udid);
        return self::isOnline($imei, $delay);
    }

    public static function isOnline($imei, $delay = 1800)
    {
        $data = RedisLogic::getDevDataByImei($imei);
        $udid = self::getUdid($imei);
        if (isset($data['attach']) && $data['attach'] == 1) {
            if (self::isEb001b($udid)) {
                return true;
            }
            if (isset($data['online']) && $data['online'] >= time() - $delay) {
                return true;
            }
        }
        return false;
    }

    public static function isContanct($imei, $delay = 48 * 3600)
    {
        $data = RedisLogic::getDevDataByImei($imei);
        if (isset($data['offline']) && $data['offline'] > time() - $delay) {
            return true;
        }
        return false;
    }

    public static function isContactByUdid($udid, $delay = 48 * 3600)
    {
        $imei = static::getImei($udid);
        return static::isContanct($imei, $delay);
    }

    public static function getLastGsmLocationInfo($imei)
    {
        return RedisLogic::getLocationByImei($imei, 'lastGSM');
    }

    public static function getLastLocationInfo($imei)
    {
        return RedisLogic::getLocationByImei($imei);
        //位置数据
        /*$location = array(
            'id' => intval($lid),	//位置数据唯一ID
            'time' => 0,			//位置时间
            'record' => 0,			//记录时间
            'begin' => 0,			//开始时间
            'type' => 0,			//类型(GPS/AGPS)
            'status' => 0,			//状态(是否在安全区域内...)
            'coord' => 0,			//坐标系类型(bti 1:WGS84; 2:GCJ02; 4:BD09)
            'store' => 0,			//位置数据存储在Redis热数据中
            'accuracy' => 0,		//位置精度
            'lat' => 0.0,			//纬度(百度坐标)
            'lng' => 0.0,			//经度(百度坐标)
            'lat_wgs' => 0.0,		//纬度(GPS坐标)
            'lng_wgs' => 0.0,		//经度(GPS坐标)
            'lat_gcj' => 0.0,		//纬度(高德坐标)
            'lng_gcj' => 0.0,		//经度(高德坐标)
            'address' => '',		//地址(百度坐标)
            'landmark' => null,		//地标(百度坐标)
            'address_wgs' => null,	//地址(GPS坐标)
            'landmark_wgs' => null,	//地标(GPS坐标)
            'address_gcj' => null,	//地标(高德坐标)
            'landmark_gcj' => null, //地标(高德坐标)
            'satCount' => 0,        //gps信号强度
            'gsmStrength' => 0,     //gsm信号强度
            'speed' =>  0,          //GPS当前速度
            'course' => -1);        //GPS当前角度(正北方向)*/

    }

    public static function getLastLocationInfoByUdid($udid)
    {
        $imei = self::getImei($udid);
        return self::getLastLocationInfo($imei);
    }

    public static function getGsm($imei)
    {
        $gsm = 0;
        $devData = RedisLogic::getDevDataByImei($imei);
        $locData = RedisLogic::getLocationByImei($imei);
        if (isset($devData['GSMsignal']) && $devData['GSMsignal']) {
            $gsm = $devData['GSMsignal'];
        } elseif ($locData && isset($locData['gsmStrength'])) {
            $gsm = $locData['gsmStrength'];
        }
        return $gsm;
    }

    public static function getGsmByUdid($udid)
    {
        $imei = self::getImei($udid);
        return self::getGsm($imei);
    }

    public static function getChipPower($imei)
    {
        $data = RedisLogic::getDevDataByImei($imei);
        if (!empty($data['battery'])) {
            return $data['battery'];
        } else {
            return 0;
        }
    }

    public static function getChipPowerByUdid($udid)
    {
        $imei = static::getImei($udid);
        return static::getChipPower($imei);
    }

    /**
     * 电瓶是否在位
     * @param $imei
     */
    public static function isBatteryConnect($imei)
    {
        $data = RedisLogic::getDevDataByImei($imei);
        if (!empty($data['charge']) && $data['charge'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function isBatteryConnectByUdid($udid)
    {
        $imei = static::getImei($udid);
        return static::isBatteryConnect($imei);
    }

    public static function getCurrentVoltage($imei)
    {
        $data = RedisLogic::getDevDataByImei($imei);
        $vcur = 0;
        if (array_key_exists('vcur', $data)) {   //当前电压
            $vcur = intval($data['vcur']);
        } elseif (array_key_exists('localvoltage', $data)) {
            //EB001B当前电压
            $vcur = intval($data['localvoltage']);
        }
        return $vcur / 10;
    }

    public static function getCurrentVoltageByUdid($udid)
    {
        $imei = self::getimei($udid);
        return self::getCurrentVoltage($imei);
    }

    public static function getMaxVoltage($imei)
    {
        $data = RedisLogic::getDevDataByImei($imei);
        if (array_key_exists('preV', $data)) {
            //上一次最大电压
            $vmax = intval($data['preV']);
        } elseif (array_key_exists('vmax', $data)) {   //最大电压
            $vmax = intval($data['vmax']);
        } else {
            $vmax = 620;
        }

        if ($vmax > (1333 + 100)) {   //电压值 * 100的情况
            $vmax = $vmax / 10;
        } else if ($vmax < 200) {   //真实电压值
            $vmax = $vmax * 10;
        }

        return $vmax;
    }

    public static function getMaxVoltageByUdid($udid)
    {
        $imei = self::getImei($udid);
        return self::getMaxVoltage($imei);
    }

    public static function getBatteryCount($imei)
    {

        //按照用户上传的电压
        $device = TDevice::whereImei($imei)->first();
        if ($device && $device->user_voltage) {
            return $device->user_voltage / 12;
        }

        //大坑 这里先用name来判断，以后稳定可以替换成id.
        $brandName = self::getBrandName($imei);
        if ($brandName && $brandName == '云创慧') {
            //云创慧用48V的车
            return 4;
        } elseif ($brandName && $brandName == '云创惠二代') {
            //众星用36V的车
            return 3;
        }

        $vmax = self::getMaxVoltage($imei);

        if ($vmax == 0) {
            return 0;
        }

        //计算电池组数
        if ($vmax > 960) {
            $gcount = 8;
        } else if ($vmax > 840) {
            $gcount = 7;
        } else if ($vmax > 720) {
            $gcount = 6;
        } else if ($vmax > 600) {
            $gcount = 5;
        } else if ($vmax > 480) {
            $gcount = 4;
        } else if ($vmax > 360) {
            $gcount = 3;
        } else if ($vmax > 240) {
            $gcount = 2;
        } else if ($vmax > 120) {
            $gcount = 1;
        } else {
            $gcount = 0;
        }
        return $gcount;
    }

    public static function getBatteryCountByUdid($udid)
    {
        $imei = self::getImei($udid);
        return self::getBatteryCount($imei);
    }

    public static function getBattery($imei)
    {
        $data = RedisLogic::getDevDataByImei($imei);

        $udid = self::getUdid($imei);

        $battery = 0;

        if (array_key_exists('percent', $data)) {

            //糖果充电器
            if (!empty($data['charger_type']) && $data['charger_type'] == 2) {
                //直接返回电压
                return intval($data['charger_chargerVoltage']);
            } else {
                $vcur = static::getCurrentVoltage($imei) * 10;
            }

            /** 剩余电量校正 **/
            $gcount = self::getBatteryCount($imei);
            $umax = !empty($data['umax']) ? $data['umax'] : 135;//单位满电电池的电压
            $umax = max($umax, 135);//最大13.5V
            $vunder = $gcount * 105; //欠压总电压

            if (in_array($udid, ['928730994076', '929950255881', '921664606798'])) {
                $umax = 130;
            }
            if (in_array($udid, ['921753803719'])) {
                $umax = 128.6;
            }

            $vfull = $gcount * $umax;//满电总电压

            //欠压
            if ($vcur <= $vunder) {
                return 0;
            }

            //满电
            if ($vcur >= $vfull) {
                return 100;
            }

            //当前电量 = [(当前电压-欠压电压)/(满电电压-欠压电压)] ^ 2
            $battery = pow((($vcur - $vunder) / ($vfull - $vunder)), 2) * 100;

            $battery = intval($battery);    //round($percent)
        }
        return $battery;
    }

    public static function getBatteryByUdid($udid)
    {
        $imei = self::getImei($udid);
        return self::getBattery($imei);
    }

    /**
     * @param $battery
     * @param $gcount
     * @param int $total 最大里层
     */
    private static function getMile($battery, $gcount, $total = 0)
    {
        //如果设置了额定里程
        if ($total) {
            return intval($battery * $total / 100);
        } elseif ($battery && $gcount) {
            if ($gcount >= 8) {
                $total = 80;    //80km(96V)
            } else if ($gcount >= 7) {
                $total = 70;    //70km(84V)
            } else if ($gcount >= 6) {
                $total = 60;    //60km(72V)
            } else if ($gcount >= 5) {
                $total = 50;    //50km(60V)
            } else if ($gcount >= 4) {
                $total = 40;    //40km(48V)
            } else if ($gcount >= 3) {
                $total = 30;    //30km(36V)
            } else if ($gcount >= 2) {
                $total = 20;    //20km(24V)
            } else {
                $total = 10;    //10km(12V)
            }
            return intval($battery * $total / 100);
        } else {
            return intval($battery * 50 / 100);
        }
    }

    public static function getExpectMile($imei)
    {
        $channelName = self::getChannelName($imei);
        $battery = self::getBattery($imei);
        $gcount = self::getBatteryCount($imei);

        $mile = self::getMile($battery, $gcount);

        //得威电商的肯定比一般续航算出来的大，单独对得威进行判断
        //大坑 稳定后可以用id判断
        if ($channelName == '得威') {
            $mile = self::getMile($battery, $gcount, 90);
        } elseif (!empty($data['permile'])) {
            $perMiles = $data['permile'];
            if ($perMiles >= 0.3 && $perMiles <= 1.5) {
                $mile2 = intval($battery * $perMiles);
                $diff = $mile2 - $mile;
                //于原来最多波动20公里
                if (abs($diff) <= 20) {
                    $mile = $mile2;
                } else {
                    if ($mile2 > $mile) {
                        $mile += 20;
                    } else {
                        $mile -= 20;
                    }
                }
            }
        }

        return intval($mile);
    }

    public static function getExpectMileByUdid($udid)
    {
        $imei = self::getImei($udid);
        return self::getExpectMile($imei);
    }

    /**
     * @param $imei
     * @return bool
     */
    public static function isTurnOn($imei)
    {
        $data = RedisLogic::getDevDataByImei($imei);
        if (array_key_exists('turnon', $data) && $data['turnon'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function isTurnOnByUdid($udid)
    {
        $imei = self::getImei($udid);
        return self::isTurnOn($imei);
    }

    /**
     * @param $imei
     * @return string
     */
    public static function getLastContact($imei)
    {
        $data = RedisLogic::getDevDataByImei($imei);
        if ($data) {
            $time = max($data['time'], $data['online'], $data['refresh'], $data['offline']);
            return date('Y-m-d H:i:s', $time);
        }
        return '';
    }

    public static function getLastContactByUdid($udid)
    {
        $imei = self::getUdid($udid);
        return self::getLastContact($imei);
    }

    public static function getLastGps($imei)
    {
        $loc = RedisLogic::getLocationByImei($imei);
        if ($loc && array_key_exists('time', $loc)) {
            return date('Y-m-d H:i:s', $loc['time']);
        }
        return '';
    }

    public static function getGpsSatCount($imei)
    {
        $gps = DeviceLogic::getLastLocationInfo($imei);
        $gsm = DeviceLogic::getLastGsmLocationInfo($imei);
        return max($gps['satCount'], $gsm['satCount']) ?: 0;
    }

    public static function getGpsSnr($imei)
    {
        $snrJson = RedisLogic::getDevDataByImei($imei)['SnrJson'];
        if($snrJson){
            return json_decode($snrJson, true);
        }
        return [];
    }

    public static function isLock($imei)
    {
        $devData = RedisLogic::getDevDataByImei($imei);
        if ($devData && $devData['prelock'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * v3.0
     * 获取电动车故障项
     * @param $udid
     * @return array
     */
    public static function getFault($imei)
    {

        $faults = FaultObject::$keyMap;

        //电动车检测项目中有问题的项
        $data = RedisLogic::getDevDataByImei($imei);
        if (!$data) {
            return [];
        }

        if (self::isTurnOn($imei) == DeviceObject::SWITCH_STATUS_TURNOFF) {
            //电门未开,没有故障
            return [];
        }

        $fault = array();
        foreach ($faults as $key => $message) {
            if (array_key_exists($key, $data) && $data[$key] == 1) {
                $fault[] = $message;
            }
        }

        return $fault;
    }

    /**
     * 获取固件版本号，用户看到的
     * @param $udid
     * @return string
     */
    public static function getRomVersionByUdid($udid)
    {
        $deviceMod = self::getProductTypeNameByUdid($udid);
        $data = RedisLogic::getDevDataByUdid($udid);
        if (!self::isEb001b($udid)) {
            $romVersion = $data['romVersion'];
            $row = TVersionUpdateInfo::whereSvnVersion($romVersion)->first();
            $bigVersion = $row ? $row->big_version : '';
            return $deviceMod . 'V' . $bigVersion . 'Build' . $data['romVersion'];
        }
        return $deviceMod . 'V' . $data['commercialVersion'] . 'Build' . $data['rom'];
    }

    public static function getVerByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            return $deviceCode->ver;
        });
    }

    public static function getMcuByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function($deviceCode){
            return $deviceCode->mcu;
        });
    }

    public static function getAdminInfoByUdid($udid)
    {
        $row = TUserDevice::whereUdid($udid)->whereOwner(0)->first();
        if ($row) {
            $user = TUser::find($row->uid);
            return $user;
        }
        return null;
    }

    public static function getFollowersByUdid($udid)
    {
        $rs = TUserDevice::join('t_user', 't_user.uid', '=', 't_user_device.uid')->whereUdid($udid)->whereOwner(1)
            ->select('t_user.*')
            ->get();
        return $rs;
    }

    /**
     * 获取骑行总里程
     * @param $udid
     * @return mixed
     */
    public static function getTotalMilesByUdid($udid)
    {
        return TEvMileageGp::whereUdid($udid)->sum('mile');
    }

    /**
     * 获取骑行次数
     * @param $udid
     * @return int
     */
    public static function getRidingTimesByUdid($udid)
    {
        return TEvMileageGp::whereUdid($udid)->count();
    }

    public static function getChargingTimesByUdid($udid)
    {
        $row = TEvCharge::whereUdid($udid)->first();
        return $row ? $row->cycle : 0;
    }

    /**
     * @param $udid
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function getLastTripInfoByUdid($udid)
    {
        $trip = TEvMileageGp::whereUdid($udid)->orderByDesc('mid')->first();
        if ($trip) {
            //因为轨迹点太卡，先去掉
            /*$begin = $trip->begin;
            $end = $trip->end;
            $locations = LocationLogic::getLocationList($udid, $begin, $end);
            $trip->addressBegin = array_shift($locations)['address'];
            $trip->addressEnd = array_pop($locations)['address'];*/
            return $trip;
        }
        return null;
    }

    /**
     * 根据里程获取消耗电能
     * @param $mileage
     * @return float
     */
    public static function getEnergyByMileage($mileage)
    {

        //1格电池0.24km/h,能跑10Km，1km是0.024km/h
        $energy = $mileage * 0.024;
        if ($energy > 0 && $energy < 0.1) {
            $energy = 0.1;
        }

        return number_format($energy, 1);
    }

    /**
     * 获取服务期限等信息
     */
    public static function getPaymentInfoByUdid($udid)
    {
        $rtn = [
            'sim_status' => '未激活',//sim卡状态
            'daterange' => '',//有效期
            'renew' => 0,//续费次数
            'service_status' => '未激活',
        ];
        $active = self::getActiveAtByUdid($udid, 'Y-m-d H:i:s');
        $row = TPayment::whereUdid($udid)->first();
        if ($row) {
            //有记录
            $rtn['daterange'] = $active . ' ~ ' . Carbon::createFromTimestamp($row->expire)->toDateTimeString();
            $rtn['sim_status'] = '正常';
            if ($row->expire > time()) {
                //有效
                $rtn['service_status'] = '服务期内';
            } else {
                //过期
                $rtn['service_status'] = '服务到期';
            }
        }

        $renews = TPaymentOrder::whereUdid($udid)->whereStatus(TPaymentOrder::PAY_STATUS_PAY)->count();
        $rtn['renew'] = $renews;
        return $rtn;

    }

    public static function getInsureOrderListByUdid($udid)
    {
        $collect = TInsureOrder::whereStatus(TInsureOrder::ORDER_STATUS_SUCCESS)->whereUdid($udid)->get();
        $nameMap = TInsureType::getNameMap();
        foreach ($collect as $row) {
            $row->daterange = $row->insure_start->toDateTimeString() . ' ~ ' . $row->insure_end->toDateTimeString();
            $row->insure_type_name = $nameMap[$row->insure_type];
            $row->from = $row->mode ? '购买' : '赠送';
        }
        return $collect;
    }

    public static function getSafeZoneListByUdid($udid)
    {
        $collect = TZoneMsg::join('t_safe_zone', 't_safe_zone.zid', '=', 't_zone_msg.zid')
            ->whereUdid($udid)
            ->select('t_safe_zone.*')
            ->get();
        foreach ($collect as $row) {
            $row->date = $row->create_time;
        }
        return $collect;
    }

    public static function isDeviceNerverOnline($imei)
    {
        return RedisLogic::isDeviceNeverOnline($imei);
    }

    /**
     * 导入城市
     */
    public static function importCity(array $data)
    {
        try {
            foreach ($data as $row) {
                $udid = $row[0];
                $province = $row[1];
                $city = $row[2];
                $chassis = $row[3];
                $name = $row[4];


                $province = str_replace('省', '', $province);
                $city = str_replace('市', '', $city);

                TDevice::firstOrCreate([
                    'udid' => $udid,
                ], [
                    'rate' => 10,
                    'name' => $name ?: $udid,
                    'imei' => DeviceLogic::getImei($udid),
                    'type' => DeviceLogic::getBrandIdByUdid($udid),
                ])->update([
                    'name' => $name ?: $udid,
                    'province' => $province,
                    'city' => $city,
                    'chassis' => $chassis,
                ]);
            }
        } catch (\Exception $e) {
            Log::error("importCity db error: {$e->getMessage()}");
            return false;
        }
        return true;
    }

    public static function getProvinceList($where = [])
    {
        return self::getAreaList($where, 'province');
    }

    public static function getCityList($where = [])
    {
        return self::getAreaList($where, 'city');
    }

    private static function getAreaList($where, $column)
    {
        $rs = TDevice::join('t_device_code', 'qr', '=', 'udid')
            ->where($where)
            ->whereNotNull($column)
            ->select($column)->distinct()
            ->get()->toArray();
        return Helper::transToOneDimensionalArray($rs, $column);
    }

    /**
     * 设备加入渠道
     */
    public static function deviceToChannel($imei, $channelId, $type, $sceneId)
    {
        $type = $type ?: 0;
        $sceneId = $sceneId ?: 0;
        $udid = self::getUdid($imei);
        # 设置已绑定设备类型数据
        TDevice::whereImei($imei)->update(['type' => $type]);

//        # 设置原始库设备类型数据
        $tDeviceCode = TDeviceCode::whereImei($imei)->first();
        if(!$tDeviceCode){
            return false;
        }
        $tDeviceCode->type = $type;
        $tDeviceCode->channel_id = $channelId;
        $tDeviceCode->customer_id = $type;
        $tDeviceCode->scene_id = $sceneId;
        $tDeviceCode->save();
        //TDeviceCode::whereImei($imei)->update(['type'=>$type]);

//        # 设置用户库设备类型数据
        DB::connection('care_user')->update("update t_device set ptype=$type where udid='$udid'");

//        # 判断设备是否已归类
        $model = TDeviceCategoryDicNew::whereLevel(6)->whereType($type)->first();

        $evmodel = 0;
        if($sceneId){
            $ebikeType = BiEbikeType::find($sceneId);
            if(!$ebikeType){
                return false;
            }
            $evmodel = sprintf('%03s', $ebikeType->ev_model);
        }



        TDeviceCategory::updateOrCreate([
            'udid'=>$udid,
        ],[
            'category'=>$type,
            'channel'=>$model ? $model->channel : 0,
            'brand'=>$model ? $model->brand: 0,
            'model'=>$evmodel ? $model->brand . $evmodel : 0,
        ]);

        //将设备踢下线
        $cmd = CommandLogic::CMD_KICK_DEVICE_OFFLINE;
        CommandLogic::sendCmd($imei, $cmd);
        return true;
    }

    /**
     * 重置设备
     * @param $imei
     */
    public static function resetDevice($imei)
    {

        $udid = self::getUdid($imei);

        //1、解绑用户
        //user 服务已经停用
        /*$client = new Client();
        $url = "http://user.qqfind.me:8080/care.api/user/device/unbindingAll.json?udid=$udid&type=0";
        $client->get($url);*/
        TUserDevice::whereUdid($udid)->delete();

        //2、删除redis中的相关数据
        RedisLogic::getRedis()->select(1);

        $locs = RedisLogic::zRangeByScore('dev_imei:'.$imei,0,time()+3600);
        foreach ($locs as $key=>$loc){
            RedisLogic::del("loc:".$loc);
        }
        RedisLogic::del('dev:'.$imei);//删除设备当前的实时数据
        RedisLogic::del('dev_loc:'.$imei);//删除设备的定位点索引
        RedisLogic::del('dev_zone:'.$imei);//删除设备的安全区域设置数据
        RedisLogic::del('zhangfei_charge:'.$imei);//删除电池数据

        if(env('APP_ENV') === 'test'){
            //测试环境下，直接修改redis哈希
            $deviceCode = TDeviceCode::whereImei($imei)->first();
            if ($deviceCode) {
                RedisLogic::hmSet('dev:' . $imei, [
                    'channel' => $deviceCode->channel_id,
                    'type' => $deviceCode->type,
                ]);
            }
        }




        //3、操作数据库
        //记录设备重置的日志

        //清除绑定用户
        TUserDevice::whereUdid($udid)->delete();

        //重置Mysql数据库激活时间数据
        TDeviceCode::whereImei($imei)->update(['active'=>0]);

        //删除Mysql数据库设备过期时间数据(未激活)
        TPayment::whereUdid($udid)->delete();

        //删除设备足迹索引数据
        TDeviceFootmark::whereUdid($udid)->delete();

        //删除设备计步总数
        TStepCounter::whereUdid($udid)->delete();

        //删除运动足迹日统计数据
        TStepHour::whereUdid($udid)->delete();

        //删除设备佩戴者属性设置数据
        TStepProperty::whereUdid($udid)->delete();

        //删除相关消息
        TUserMsg::whereSource($udid)->delete();
        //电动车相关数据清理
        TEvDay::whereUdid($udid)->delete();
        TEvSituation::whereUdid($udid)->delete();

        //电动车统计数据清理
        TEvMileageGp::whereUdid($udid)->delete();
        TEvMileage::whereUdid($udid)->delete();
        TEvVoltage::whereUdid($udid)->delete();
        TEvCharge::whereUdid($udid)->delete();

        //设备日志数据清理
        //用户设置日志
        TDeviceSetLog::whereUdid($udid)->delete();

        //充电日志
        TEvCharge::whereUdid($udid)->delete();

        //锁车日志
        TLockLog::whereUdid($udid)->delete();
        TChipMileage::whereUdid($udid)->delete();

        BiDeliveryDevice::whereImei($imei)->update(['state'=>BiDeliveryDevice::STATE_INVALID]);

        //将设备踢下线
        CommandLogic::sendCmd($imei, CommandLogic::CMD_KICK_DEVICE_OFFLINE);
    }

}