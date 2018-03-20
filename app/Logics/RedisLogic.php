<?php

namespace App\Logics;

//封装一下redis类
use Illuminate\Support\Facades\Redis;

class RedisLogic extends BaseLogic
{
    private static $redis = null;

    private static $devData = [];//imei=>array

    private static $locData = [];//imei=>array

    /**
     * 获取redis示例
     * @return \Redis
     */
    public static function getRedis()
    {
        if (!self::$redis) {
            self::$redis = Redis::connection();
        }
        return self::$redis;
    }

    public static function __callStatic($name, $arguments)
    {
        return self::getRedis()->$name($arguments);
    }

    public static function getDevDataByImei($imei)
    {
        //加个类缓存
        if (isset(self::$devData[$imei])) {
            return self::$devData[$imei];
        }
        $key = 'dev:' . $imei;
        $data = self::getRedis()->hGetAll($key) ?: [];
        return self::$devData[$imei] = $data;
    }

    public static function getDevDataByUdid($udid)
    {
        $imei = DeviceLogic::getImei($udid);
        return self::getDevDataByImei($imei);
    }

    public static function getLoctionByImei($imei)
    {
        //加个类缓存
        if (isset(self::$locData[$imei])) {
            return self::$locData[$imei];
        }
        $devData = self::getDevDataByImei($imei);
        if (isset($devData['last']) && $devData['last']) {
            $key = 'loc:' . $devData['last'];
            $data = self::getRedis()->hGetAll($key) ?: [];
            return self::$locData[$imei] = $data;
        }
        return [];
    }

    public static function getLocationByUdid($udid)
    {
        $imei = DeviceLogic::getImei($udid);
        return self::getLoctionByImei($imei);
    }

    public static function sendCmd($imei, int $commandId)
    {

    }

    public static function sendCmdByUdid($udid, int $commandId)
    {
        $imei = DeviceLogic::getImei($udid);
        return self::sendCmd($imei, $commandId);
    }


}