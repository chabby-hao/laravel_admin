<?php

namespace App\Objects;

class DeviceObject extends BaseObject
{

    //渠道品牌缓存前缀
    const CACHE_ALL_PRE = 'all:';//全部缓存
    const CACHE_CHANNEL_PRE = 'channel:';//渠道缓存前缀
    const CACHE_BRAND_PRE = 'brand:';//品牌缓存前缀
    const CACHE_EBIKE_TYPE_PRE = 'ebike_type:';//车型缓存前缀

    const CACHE_DEVICE_TYPE_PRE = 'device_type:';//设备型号缓存前缀

    const CACHE_MAP_PRE = 'map:';//地图缓存前缀

    //缓存前缀
    const CACHE_LIST_PRE = 'dev_list:';
    const CACHE_LIST_COUNT_PRE = 'dev_list_count:';
    const CACHE_OBJ_PRE = 'dev:';
    //const CACHE_LIST_ALL = 'all';

    const CACHE_LIST_RIDING = 'riding';//使用中
    const CACHE_LIST_PARK = 'park';//使用中
    const CACHE_LIST_OFFLINE_LESS_48 = 'offline_less48';//使用中
    const CACHE_LIST_OFFLINE_MORE_48 = 'offline_more48';//使用中
    const CACHE_LIST_ONLINE = 'online';
    const CACHE_LIST_OFFLINE = 'offline';

    const CACHE_ONLINED = 'onlined';//有过数据的

    const SWITCH_STATUS_TURNON = 1;//电门开
    const SWITCH_STATUS_TURNOFF = 0;//电门关

    const LOCK = 1;//已锁
    const UNLOCK = 0;//未锁

    const ONLINE = 1;//在线
    const OFFLINE = 0;//离线

    const ACTIVE = 1;//激活
    const NOT_ACTIVE = 0;//未激活

    public static function getOnlineOfflineTypeMap($type = null)
    {
        $map = [
            self::ONLINE => '在线',
            self::OFFLINE => '离线',
        ];
        return $type === null ? $map : $map[$type];
    }

    public static function getActiveTypeMap($type = null)
    {
        $map = [
            self::ACTIVE=>'激活',
            self::NOT_ACTIVE=>'未激活',
        ];
        return $type === null ? $map : $map[$type];

    }


    const LOCK_TYPE_ANQI = 'lock';//锁车
    const UNLOCK_TYPE_ANQI = 'unlock';//解锁
    const LOCK_TYPE_SWITCH_OFF = 'd_lock';//锁车开电门
    const UNLOCK_TYPE_SIWTCH_ON = 'd_unlock';//锁车关电门
    const LOCK_TYPE_BATTERY = 'p_lock';//电池锁
    const UNLOCK_TYPE_BATTERY = 'p_unlock';//电池解锁
    const LOCK_TYPE_SHANQI = 'sq_lock';//闪骑锁车
    const UNLOCK_TYPE_SHANQI = 'sq_unlock';//闪骑解锁
    const LOCK_TYPE_XIYOU = 'xy_lock';//西游锁车
    const UNLOCK_TYPE_XIYOU = 'xy_unlock';//西游解锁
    const LOCK_TYPE_485 = '485_lock';//485锁
    const UNLOCK_TYPE_485 = '485_unlock';//485解锁

    public static function getLockTypeMap($type = null)
    {
        $map = [
            self::LOCK_TYPE_ANQI => '锁车',
            self::UNLOCK_TYPE_ANQI => '解锁',
            self::LOCK_TYPE_SWITCH_OFF => '锁车开电门',
            self::UNLOCK_TYPE_SIWTCH_ON => '锁车关电门',
            self::LOCK_TYPE_BATTERY => '电池锁',
            self::UNLOCK_TYPE_BATTERY => '电池解锁',
            self::LOCK_TYPE_SHANQI => '闪骑锁车',
            self::UNLOCK_TYPE_SHANQI => '闪骑解锁',
            self::LOCK_TYPE_XIYOU => '西游锁车',
            self::UNLOCK_TYPE_XIYOU => '西游解锁',
            self::LOCK_TYPE_485 => '485锁车',
            self::UNLOCK_TYPE_485 => '485解锁',
        ];
        return $type === null ? $map : $map[$type];
    }


    public static function getDeviceStatusCacheMap()
    {
        $map = [
            //self::CACHE_LIST_ALL => '全部',
            self::CACHE_LIST_RIDING => '骑行',
            self::CACHE_LIST_PARK => '停车',
            self::CACHE_LIST_OFFLINE_LESS_48 => '离线小于48h',
            self::CACHE_LIST_OFFLINE_MORE_48 => '离线大于48h',
        ];
        return $map;
    }

    public $udid = '';//设备号
    public $imei = '';//imei号
    public $productType = 0;//产品型号id
    public $productTypeName = '';//产品型号，eb001*
    public $deviceType = 0;//设备型号
    public $deviceTypeName = '';//B800
    public $ebikeTypeId = 0;//车型Id
    public $ebikeTypeName = '';//车辆型号名称
    public $brandId = 0;//品牌Id
    public $brandName = '';//品牌名称
    public $channelId = 0;//渠道id
    public $channelName = '';//渠道名称
    public $deliverdAt = '';//出货时间,datetime
    public $registerAt = '';//生成时间,datetime
    public $activeAt = '';//激活时间,datetime

    public $isOnline = 0;//0=离线，1=在线
    public $isOnlineTrans = '';
    public $isContact = 0;//0=失联，1=在联
    public $isContactTrans = '';
    public $lat = 0;//百度坐标系
    public $lng = 0;//百度坐标系
    public $lastGps = '';//最后一次GPS上报时间
    public $address = '';//地址(百度坐标系地址)
    public $gsm = '';//$list[$key]['GSM'] = $value['gsmstrength'] ? '-'.$value['gsmstrength'].'DB':'';//gsm信号
    public $chipPower = 0;//智慧芯电量
    public $charge = 0;//电瓶是否在位
    public $chargeTrans = '';
    public $voltage = 0;//当前电压,v
    public $batteryCount = 0;//电池数量
    public $batterySpecification = 0;//电池规格
    public $battery = 0;//电量
    public $expectMile = 0;//预估里程,km
    public $turnon = 0;//是否启动,0=未启动，1=启动
    public $turnonTrans = '';
    public $ebikeStatus = '';//设备状态，骑行，停车，离线48小时内，离线48小时外
    public $lastContact = '';//最后一次状态通讯时间,datetime
    public $isLock = 0;//0=未锁，1=已锁
    public $isLockTrans = '';
    public $deviceCycle = 0;//设备周期
    public $deviceCycleTrans = '';// 设备周期翻译

    /**
     * @return string
     */
    public function getUdid(): string
    {
        return $this->udid;
    }

    /**
     * @param string $udid
     */
    public function setUdid($udid)
    {
        $this->udid = $udid;
    }

    /**
     * @return string
     */
    public function getImei(): string
    {
        return $this->imei;
    }

    /**
     * @param string $imei
     */
    public function setImei($imei)
    {
        $this->imei = $imei;
    }

    /**
     * @return int
     */
    public function getProductType(): int
    {
        return $this->productType;
    }

    /**
     * @param int $productType
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    /**
     * @return string
     */
    public function getProductTypeName(): string
    {
        return $this->productTypeName;
    }

    /**
     * @param string $productTypeName
     */
    public function setProductTypeName($productTypeName)
    {
        $this->productTypeName = $productTypeName;
    }

    /**
     * @return int
     */
    public function getDeviceType(): int
    {
        return $this->deviceType;
    }

    /**
     * @param int $deviceType
     */
    public function setDeviceType($deviceType)
    {
        $this->deviceType = $deviceType;
    }

    /**
     * @return string
     */
    public function getDeviceTypeName(): string
    {
        return $this->deviceTypeName;
    }

    /**
     * @param string $deviceTypeName
     */
    public function setDeviceTypeName($deviceTypeName)
    {
        $this->deviceTypeName = $deviceTypeName;
    }


    /**
     * @return int
     */
    public function getEbikeTypeId(): int
    {
        return $this->ebikeTypeId;
    }

    /**
     * @param int $ebikeTypeId
     */
    public function setEbikeTypeId($ebikeTypeId)
    {
        $this->ebikeTypeId = $ebikeTypeId;
    }

    /**
     * @return string
     */
    public function getEbikeTypeName(): string
    {
        return $this->ebikeTypeName;
    }

    /**
     * @param string $ebikeTypeName
     */
    public function setEbikeTypeName($ebikeTypeName)
    {
        $this->ebikeTypeName = $ebikeTypeName;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;
    }

    /**
     * @return string
     */
    public function getBrandName(): string
    {
        return $this->brandName;
    }

    /**
     * @param string $brandName
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;
    }

    /**
     * @return int
     */
    public function getChannelId(): int
    {
        return $this->channelId;
    }

    /**
     * @param int $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return string
     */
    public function getChannelName(): string
    {
        return $this->channelName;
    }

    /**
     * @param string $channelName
     */
    public function setChannelName($channelName)
    {
        $this->channelName = $channelName;
    }

    /**
     * @return string
     */
    public function getDeliverdAt(): string
    {
        return $this->deliverdAt;
    }

    /**
     * @param string $deliverdAt
     */
    public function setDeliverdAt($deliverdAt)
    {
        $this->deliverdAt = $deliverdAt;
    }

    /**
     * @return string
     */
    public function getRegisterAt(): string
    {
        return $this->registerAt;
    }

    /**
     * @param string $registerAt
     */
    public function setRegisterAt($registerAt)
    {
        $this->registerAt = $registerAt;
    }

    /**
     * @return string
     */
    public function getActiveAt(): string
    {
        return $this->activeAt;
    }

    /**
     * @param string $activeAt
     */
    public function setActiveAt($activeAt)
    {
        $this->activeAt = $activeAt;
    }

    /**
     * @return int
     */
    public function getisOnline(): int
    {
        return $this->isOnline;
    }

    /**
     * @param int $isOnline
     */
    public function setIsOnline($isOnline)
    {
        $this->isOnline = $isOnline;
    }

    /**
     * @return string
     */
    public function getisOnlineTrans(): string
    {
        return $this->isOnlineTrans;
    }

    /**
     * @param string $isOnlineTrans
     */
    public function setIsOnlineTrans($isOnlineTrans)
    {
        $this->isOnlineTrans = $isOnlineTrans;
    }

    /**
     * @return int
     */
    public function getisContact(): int
    {
        return $this->isContact;
    }

    /**
     * @param int $isContact
     */
    public function setIsContact($isContact)
    {
        $this->isContact = $isContact;
    }

    /**
     * @return string
     */
    public function getisContactTrans(): string
    {
        return $this->isContactTrans;
    }

    /**
     * @param string $isContactTrans
     */
    public function setIsContactTrans($isContactTrans)
    {
        $this->isContactTrans = $isContactTrans;
    }

    /**
     * @return int
     */
    public function getLat(): int
    {
        return $this->lat;
    }

    /**
     * @param int $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return int
     */
    public function getLng(): int
    {
        return $this->lng;
    }

    /**
     * @param int $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getGsm(): string
    {
        return $this->gsm;
    }

    /**
     * @param string $gsm
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;
    }

    /**
     * @return int
     */
    public function getChipPower(): int
    {
        return $this->chipPower;
    }

    /**
     * @param int $chipPower
     */
    public function setChipPower($chipPower)
    {
        $this->chipPower = $chipPower;
    }

    /**
     * @return int
     */
    public function getCharge(): int
    {
        return $this->charge;
    }

    /**
     * @param int $charge
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;
    }

    /**
     * @return int
     */
    public function getVoltage(): int
    {
        return $this->voltage;
    }

    /**
     * @param int $voltage
     */
    public function setVoltage($voltage)
    {
        $this->voltage = $voltage;
    }

    /**
     * @return int
     */
    public function getBatteryCount(): int
    {
        return $this->batteryCount;
    }

    /**
     * @param int $batteryCount
     */
    public function setBatteryCount($batteryCount)
    {
        $this->batteryCount = $batteryCount;
    }

    /**
     * @return int
     */
    public function getBattery(): int
    {
        return $this->battery;
    }

    /**
     * @param int $battery
     */
    public function setBattery($battery)
    {
        $this->battery = $battery;
    }

    /**
     * @return int
     */
    public function getExpectMile(): int
    {
        return $this->expectMile;
    }

    /**
     * @param int $expectMile
     */
    public function setExpectMile($expectMile)
    {
        $this->expectMile = $expectMile;
    }

    /**
     * @return int
     */
    public function getTurnon(): int
    {
        return $this->turnon;
    }

    /**
     * @param int $turnon
     */
    public function setTurnon($turnon)
    {
        $this->turnon = $turnon;
    }

    /**
     * @return string
     */
    public function getTurnonTrans(): string
    {
        return $this->turnonTrans;
    }

    /**
     * @param string $turnonTrans
     */
    public function setTurnonTrans($turnonTrans)
    {
        $this->turnonTrans = $turnonTrans;
    }

    /**
     * @return string
     */
    public function getLastContact(): string
    {
        return $this->lastContact;
    }

    /**
     * @param string $lastContact
     */
    public function setLastContact($lastContact)
    {
        $this->lastContact = $lastContact;
    }

    /**
     * @return string
     */
    public function getLastGps(): string
    {
        return $this->lastGps;
    }

    /**
     * @param string $lastGps
     */
    public function setLastGps($lastGps)
    {
        $this->lastGps = $lastGps;
    }

    /**
     * @return int
     */
    public function getBatterySpecification(): int
    {
        return $this->batterySpecification;
    }

    /**
     * @param int $batterySpecification
     */
    public function setBatterySpecification($batterySpecification)
    {
        $this->batterySpecification = $batterySpecification;
    }

    /**
     * @return int
     */
    public function getisLock(): int
    {
        return $this->isLock;
    }

    /**
     * @param int $isLock
     */
    public function setIsLock($isLock)
    {
        $this->isLock = $isLock;
    }

    /**
     * @return string
     */
    public function getisLockTrans(): string
    {
        return $this->isLockTrans;
    }

    /**
     * @param string $isLockTrans
     */
    public function setIsLockTrans($isLockTrans)
    {
        $this->isLockTrans = $isLockTrans;
    }

    /**
     * @return string
     */
    public function getChargeTrans(): string
    {
        return $this->chargeTrans;
    }

    /**
     * @param string $chargeTrans
     */
    public function setChargeTrans($chargeTrans)
    {
        $this->chargeTrans = $chargeTrans;
    }

    /**
     * @return string
     */
    public function getEbikeStatus(): string
    {
        return $this->ebikeStatus;
    }

    /**
     * @param string $ebikeStatus
     */
    public function setEbikeStatus($ebikeStatus)
    {
        $this->ebikeStatus = $ebikeStatus;
    }

    /**
     * @return int
     */
    public function getDeviceCycle(): int
    {
        return $this->deviceCycle;
    }

    /**
     * @param int $deviceCycle
     */
    public function setDeviceCycle($deviceCycle)
    {
        $this->deviceCycle = $deviceCycle;
    }

    /**
     * @return string
     */
    public function getDeviceCycleTrans(): string
    {
        return $this->deviceCycleTrans;
    }

    /**
     * @param string $deviceCycleTrans
     */
    public function setDeviceCycleTrans($deviceCycleTrans)
    {
        $this->deviceCycleTrans = $deviceCycleTrans;
    }


}