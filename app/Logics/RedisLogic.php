<?php

namespace App\Logics;

//封装一下redis类
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class RedisLogic extends BaseLogic
{

    const REDIS_LIST_KEY_PRE = 'CommandList_';//多进程队列

    private static $redis = null;

    private static $devData = [];//imei=>array

    private static $locData = [];//imei=>array

    private static $zhangfeiData = [];//imei=>array

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

    public static function getDevDataByImei($imei)
    {
        //加个类缓存
        if (isset(self::$devData[$imei])) {
            return self::$devData[$imei];
        }
        $key = 'dev:' . $imei;
        self::getRedis()->select(1);
        $data = self::getRedis()->hGetAll($key) ?: [];
        Log::debug("redis hgetall $key", $data);
        return self::$devData[$imei] = $data;
    }

    public static function getZhangfeiByImei($imei)
    {
        //加个类缓存
        if (isset(self::$zhangfeiData[$imei])) {
            return self::$zhangfeiData[$imei];
        }
        $key = 'zhangfei_charge:' . $imei;
        self::getRedis()->select(1);
        $data = self::getRedis()->hGetAll($key) ?: [];
        Log::debug("redis hgetall $key", $data);
        return self::$zhangfeiData[$imei] = $data;
    }

    public static function getDevDataByUdid($udid)
    {
        $imei = DeviceLogic::getImei($udid);
        return self::getDevDataByImei($imei);
    }

    /**
     * @param $imei
     * @param string $lastKey  last|lastGSM
     * @return array|mixed
     */
    public static function getLocationByImei($imei, $lastKey = 'last')
    {
        //加个类缓存
        if (isset(self::$locData[$lastKey.$imei])) {
            return self::$locData[$lastKey.$imei];
        }
        $devData = self::getDevDataByImei($imei);
        if (isset($devData[$lastKey]) && $devData[$lastKey]) {
            $key = 'loc:' . $devData[$lastKey];
            $data = self::getRedis()->hGetAll($key) ?: [];
            return self::$locData[$lastKey.$imei] = $data;
        }
        return [];
    }

    public static function getLocationByUdid($udid, $lastKey = 'last')
    {
        $imei = DeviceLogic::getImei($udid);
        return self::getLocationByImei($imei, $lastKey);
    }

    public static function lPush($key, $val)
    {
        return self::getRedis()->lPush($key, $val);
    }

    public static function hGet($key, $hashKey)
    {
        return self::getRedis()->hGet($key, $hashKey);
    }

    public static function hGetAll($key)
    {
        return self::getRedis()->hGetAll($key);
    }

    public static function sendCmd($imei, int $cmd)
    {
        self::getRedis()->select(6);
        $listNumber = self::hGet('device_server', $imei);
        if(!$listNumber){
            $listNumber = 1;
        }
        $listNumber = trim($listNumber);

        $a = pack('P', $imei);
        $b = pack('V', $cmd);
        $val = $a . $b;
        Log::notice("cloud/command imei:$imei , cmd: $cmd, push redis ". $val .' list key :' . self::REDIS_LIST_KEY_PRE . ($listNumber - 1));

        //日志
        //$logLogic = new LogLogic();
        //$logLogic->addCmdLog($imei, $cmd, LogLogic::CMD_LOG_TYPE_REMOTE, $channel);
        return self::lPush(self::REDIS_LIST_KEY_PRE . ($listNumber - 1), $val);
    }

    public static function hSet($key, $hashKey, $value)
    {
        Log::info("redis hset $key $hashKey $value");
        $res = self::getRedis()->hSet($key, $hashKey, $value);
        if($res !== false){
            return true;
        }else{
            return false;
        }
    }

}