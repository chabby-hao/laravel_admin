<?php

namespace App\Objects;

class DeviceObject extends BaseObject
{

    const SWITCH_STATUS_TURNON = 1;//电门开
    const SWITCH_STATUS_TURNOFF = 0;//电门关

    public $udid = '';//设备号
    public $imei = '';//imei号
    public $productType = 0;//产品型号id
    public $productTypeName = '';//产品型号，eb001*
    public $ebikeTypeId = 0;//车型Id
    public $ebikeTypeName = '';//车辆型号名称
    public $brandId = 0;//品牌Id
    public $brandName = '';//品牌名称
    public $channelId = 0;//渠道id
    public $channelName = '';//渠道名称
    public $deliverdAt = '';//出货时间,datetime
    public $registerAt = '';//生成时间,datetime

    public $isOnline = 0;//0=离线，1=在线
    public $isOnlineTrans = '';
    public $isContact = 0;//0=失联，1=在联
    public $isContactTrans = '';
    public $lat = 0;//百度坐标系
    public $lng = 0;//百度坐标系
    public $address = '';//地址(百度坐标系地址)
    public $gsm = '';//$list[$key]['GSM'] = $value['gsmstrength'] ? '-'.$value['gsmstrength'].'DB':'';//gsm信号
    public $chipPower = 0;//智慧芯电量
    public $charge = 0;//电瓶是否在位
    public $voltage = 0;//当前电压,0.1v
    public $batteryCount = 0;//电池数量
    public $battery = 0;//电量
    public $expectMile = 0;//预估里程,km
    public $turnon = 0;//是否启动,0=未启动，1=启动
    public $turnonTrans = '';
    public $lastContact = '';

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
    }//最后一次通讯时间,datetime




}