<?php

namespace App\Logics;

//单独对命令再封装一层

class CommandLogic extends BaseLogic
{

    const CMD_REFRESH_GPS = 22003;//刷新GPS
    const CMD_REFRESH_GSM = 22004;//刷新GSM

    const CMD_REFRESH_GSM_GPS = 22007;//获取即时GSM,GPS信号强度信息
    const CMD_VOICE_UPDATE_LOCK = 23010;//锁车声音文件更新
    const CMD_VOICE_UPDATE_UNLOCK = 23011;//锁车声音文件更新
    const CMD_VOICE_UPDATE_WARNING = 23012;//锁车声音文件更新

    public static function sendCmd($imei, int $cmd)
    {
        return RedisLogic::sendCmd($imei, $cmd);
    }

    public static function sendCmdByUdid($udid, int $cmd)
    {
        $imei = DeviceLogic::getImei($udid);
        return self::sendCmd($imei, $cmd);
    }

    public static function cmdToHashKey($type)
    {
        $map = [
            self::CMD_VOICE_UPDATE_LOCK => 'CtlLockMusic',
            self::CMD_VOICE_UPDATE_UNLOCK => 'CtlUnlockMusic',
            self::CMD_VOICE_UPDATE_WARNING => 'CtlWarringMusic',
        ];
        return $map[$type];
    }

    public static function cmdSet($imei, $hashKey, $value)
    {
        $key = 'command:' . $imei;
        RedisLogic::getRedis()->select(6);
        RedisLogic::hSet($key, $hashKey, $value);
    }

}