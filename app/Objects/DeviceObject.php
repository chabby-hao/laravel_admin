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
    public $lastContact = '';//最后一次通讯时间,datetime

    /**
     * @return string
     */
    public function getUdid(): string
    {
        return $this->udid;
    }

    /**
     * @param string $udid
     * @return DeviceObject
     */
    public function setUdid(string $udid): DeviceObject
    {
        $this->udid = $udid;
        return $this;
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
     * @return DeviceObject
     */
    public function setImei(string $imei): DeviceObject
    {
        $this->imei = $imei;
        return $this;
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
     * @return DeviceObject
     */
    public function setProductType(int $productType): DeviceObject
    {
        $this->productType = $productType;
        return $this;
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
     * @return DeviceObject
     */
    public function setProductTypeName(string $productTypeName): DeviceObject
    {
        $this->productTypeName = $productTypeName;
        return $this;
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
     * @return DeviceObject
     */
    public function setEbikeTypeId(int $ebikeTypeId): DeviceObject
    {
        $this->ebikeTypeId = $ebikeTypeId;
        return $this;
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
     * @return DeviceObject
     */
    public function setEbikeTypeName(string $ebikeTypeName): DeviceObject
    {
        $this->ebikeTypeName = $ebikeTypeName;
        return $this;
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
     * @return DeviceObject
     */
    public function setBrandId(int $brandId): DeviceObject
    {
        $this->brandId = $brandId;
        return $this;
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
     * @return DeviceObject
     */
    public function setBrandName(string $brandName): DeviceObject
    {
        $this->brandName = $brandName;
        return $this;
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
     * @return DeviceObject
     */
    public function setChannelId(int $channelId): DeviceObject
    {
        $this->channelId = $channelId;
        return $this;
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
     * @return DeviceObject
     */
    public function setChannelName(string $channelName): DeviceObject
    {
        $this->channelName = $channelName;
        return $this;
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
     * @return DeviceObject
     */
    public function setDeliverdAt(string $deliverdAt): DeviceObject
    {
        $this->deliverdAt = $deliverdAt;
        return $this;
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
     * @return DeviceObject
     */
    public function setRegisterAt(string $registerAt): DeviceObject
    {
        $this->registerAt = $registerAt;
        return $this;
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
     * @return DeviceObject
     */
    public function setIsOnline(int $isOnline): DeviceObject
    {
        $this->isOnline = $isOnline;
        return $this;
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
     * @return DeviceObject
     */
    public function setIsOnlineTrans(string $isOnlineTrans): DeviceObject
    {
        $this->isOnlineTrans = $isOnlineTrans;
        return $this;
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
     * @return DeviceObject
     */
    public function setIsContact(int $isContact): DeviceObject
    {
        $this->isContact = $isContact;
        return $this;
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
     * @return DeviceObject
     */
    public function setIsContactTrans(string $isContactTrans): DeviceObject
    {
        $this->isContactTrans = $isContactTrans;
        return $this;
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
     * @return DeviceObject
     */
    public function setLat(int $lat): DeviceObject
    {
        $this->lat = $lat;
        return $this;
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
     * @return DeviceObject
     */
    public function setLng(int $lng): DeviceObject
    {
        $this->lng = $lng;
        return $this;
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
     * @return DeviceObject
     */
    public function setAddress(string $address): DeviceObject
    {
        $this->address = $address;
        return $this;
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
     * @return DeviceObject
     */
    public function setGsm(string $gsm): DeviceObject
    {
        $this->gsm = $gsm;
        return $this;
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
     * @return DeviceObject
     */
    public function setChipPower(int $chipPower): DeviceObject
    {
        $this->chipPower = $chipPower;
        return $this;
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
     * @return DeviceObject
     */
    public function setCharge(int $charge): DeviceObject
    {
        $this->charge = $charge;
        return $this;
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
     * @return DeviceObject
     */
    public function setVoltage(int $voltage): DeviceObject
    {
        $this->voltage = $voltage;
        return $this;
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
     * @return DeviceObject
     */
    public function setBatteryCount(int $batteryCount): DeviceObject
    {
        $this->batteryCount = $batteryCount;
        return $this;
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
     * @return DeviceObject
     */
    public function setBattery(int $battery): DeviceObject
    {
        $this->battery = $battery;
        return $this;
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
     * @return DeviceObject
     */
    public function setExpectMile(int $expectMile): DeviceObject
    {
        $this->expectMile = $expectMile;
        return $this;
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
     * @return DeviceObject
     */
    public function setTurnon(int $turnon): DeviceObject
    {
        $this->turnon = $turnon;
        return $this;
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
     * @return DeviceObject
     */
    public function setTurnonTrans(string $turnonTrans): DeviceObject
    {
        $this->turnonTrans = $turnonTrans;
        return $this;
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
     * @return DeviceObject
     */
    public function setLastContact(string $lastContact): DeviceObject
    {
        $this->lastContact = $lastContact;
        return $this;
    }




}