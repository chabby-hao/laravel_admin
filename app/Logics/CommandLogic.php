<?php

namespace App\Logics;

//单独对命令再封装一层

class CommandLogic extends BaseLogic
{

    const CMD_REFRESH_GSM = 22007;//获取即时GSM,GPS信号强度信息

    public static function sendCmd($imei, int $cmd)
    {
        return RedisLogic::sendCmd($imei, $cmd);
    }

    public static function sendCmdByUdid($udid, int $cmd)
    {
        $imei = DeviceLogic::getImei($udid);
        return self::sendCmd($imei, $cmd);
    }

}