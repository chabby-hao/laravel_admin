<?php

namespace App\Logics;

//封装一下redis类
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Predis\Client;

class RedisLogic extends BaseLogic
{

    const REDIS_LIST_KEY_PRE = 'CommandList_';//多进程队列

    private static $redis = null;

    private static $devData = [];//imei=>array

    private static $locData = [];//imei=>array

    private static $zhangfeiData = [];//imei=>array

    public static function clear()
    {
        self::$devData = [];
        self::$locData = [];
        self::$zhangfeiData = [];
    }

    /**
     * 获取redis示例
     * @return Client
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
        //Log::debug("redis hgetall $key", $data);
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
        //Log::debug("redis hgetall $key", $data);
        return self::$zhangfeiData[$imei] = $data;
    }

    public static function getImeiByBatteryId($batteryId)
    {
        self::getRedis()->select(1);
        $imei = self::getRedis()->hGet('batteryIDToIMEI', $batteryId);
        return $imei;
    }

    public static function getZhangfeiByBatteryId($batteryId)
    {
        $key = 'zhangfei_charge_batteryID:' . $batteryId;
        self::getRedis()->select(1);
        $data = self::getRedis()->hGetAll($key) ?: [];
        //Log::debug("redis hgetall $key", $data);
        /*$ret['udid'] = strval($udid);
        $ret["timeStamp"] = intval($redisData["timeStamp"]);
        $ret["type"] = intval($redisData["type"]);
        $ret["batteryOnlieState"] = intval($redisData["batteryOnlieState"]);
        $ret["lineState"] = intval($redisData["lineState"]);
        $ret["batteryID"] = strval($redisData["batteryID"]);
        $ret["batteryLevel"] = intval($redisData["batteryLevel"]);
        $ret["batteryVoltage"] = intval($redisData["batteryVoltage"]);
        $ret["coreTemperature"] = intval($redisData["coreTemperature"]);
        $ret["batteryCycleTimes"] = intval($redisData["batteryCycleTimes"]);
        $ret["batteryIOCurrent"] = intval($redisData["batteryIOCurrentPlus"]);
        if(!$ret['batteryIOCurrent']){
            $ret['batteryIOCurrent'] = intval($redisData['batteryIOCurrent']);
        }
        $ret["PCBTemperature"] = intval($redisData["PCBTemperature"]);
        $ret["batteryHealthState"] = intval($redisData["batteryHealthState"]);
        $ret["batteryIOState"] = intval($redisData["batteryIOState"]);*/
        return $data;
    }

    public static function getDevDataByUdid($udid)
    {
        $imei = DeviceLogic::getImei($udid);
        return self::getDevDataByImei($imei);
    }

    public static function getLocationByLid($lid)
    {
        $key = 'loc:' . $lid;
        return self::getRedis()->hGetAll($key);
    }

    /**
     * @param $imei
     * @param string $lastKey last|lastGSM
     * @return array|mixed
     */
    public static function getLocationByImei($imei, $lastKey = 'last')
    {
        //加个类缓存
        if (isset(self::$locData[$lastKey . $imei])) {
            return self::$locData[$lastKey . $imei];
        }
        $devData = self::getDevDataByImei($imei);
        if (isset($devData[$lastKey]) && $devData[$lastKey]) {
            $key = 'loc:' . $devData[$lastKey];
            $data = self::getRedis()->hGetAll($key) ?: [];
            if (isset($data['time'])) {
                $data['dateTime'] = Carbon::createFromTimestamp($data['time'])->toDateTimeString();
            }
            return self::$locData[$lastKey . $imei] = $data;
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
        if (!$listNumber) {
            $listNumber = 1;
        }
        $listNumber = trim($listNumber);

        $a = pack('P', $imei);
        $b = pack('V', $cmd);
        $val = $a . $b;
        Log::notice("cloud/command imei:$imei , cmd: $cmd, push redis " . $val . ' list key :' . self::REDIS_LIST_KEY_PRE . ($listNumber - 1));

        //日志
        //$logLogic = new LogLogic();
        //$logLogic->addCmdLog($imei, $cmd, LogLogic::CMD_LOG_TYPE_REMOTE, $channel);
        return self::lPush(self::REDIS_LIST_KEY_PRE . ($listNumber - 1), $val);
    }

    public static function hSet($key, $hashKey, $value)
    {
        Log::info("redis hset $key $hashKey $value");
        $res = self::getRedis()->hSet($key, $hashKey, $value);
        if ($res !== false) {
            return true;
        } else {
            return false;
        }
    }

    public static function del($key)
    {
        return self::getRedis()->del($key);
    }

    public static function delete($key)
    {
        return self::del($key);
    }

    public static function sMembers($key)
    {
        return self::getRedis()->sMembers($key);
    }

    public static function zRangeByScore($key, $start, $end, array $options = array())
    {
        return self::getRedis()->zRangeByScore($key, $start, $end, $options);
    }

    public static function exists($key)
    {
        return self::getRedis()->exists($key);
    }

    public static function isDeviceNeverOnline($imei)
    {
        $key = 'dev:' . $imei;
        $b = self::exists($key);
        return !$b;
    }

}