<?php

namespace App\Logics;

use App\Models\BiBrand;
use App\Models\BiChannel;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\TDeviceCode;
use App\Objects\DeviceObject;

class DeviceLogic extends BaseLogic
{

    /** @var DeviceObject $device */
    private $device = null;

    public static function getDevice()
    {

    }

    public static function getUdid($imei)
    {

    }

    public static function getImei($udid)
    {

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
     * @param $udid
     * @return string
     */
    public static function getProductTypeNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $productType = BiProductType::find($deviceCode->model);
            return $productType ? $productType->product_name : '';
        });
    }

    public static function getEbikeTypeNameByUdid($udid)
    {

        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $ebikeTypeName = BiEbikeType::find($deviceCode->ebike_type_id);
            return $ebikeTypeName ? $ebikeTypeName->ebike_name : '';
        });
    }

    public static function getBrandNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $ebikeTypeName = BiBrand::find($deviceCode->brand_id);
            return $ebikeTypeName->brand_name ?: '';
        });
    }

    public static function getChannelNameByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function ($deviceCode) {
            $ebikeTypeName = BiChannel::find($deviceCode->channel_id);
            return $ebikeTypeName->channel_name ?: '';
        });
    }

    /**
     * 获取出货时间 Y-m-d H:i:s
     * @param $udid
     * @return string
     */
    public static function getDeliverdAtByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function($deviceCode){

        });
    }

    public static function getRegisterAtByUdid($udid)
    {
        return self::deviceCodeCallBack($udid, function($deviceCode){
            return $deviceCode->register;
        });
    }


}