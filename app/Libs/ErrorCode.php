<?php

namespace App\Libs;


class ErrorCode
{

    //逻辑层
    public static $errParams = 1001;//参数错误

    public static $errSign = 1002;//签名错误


    //业务层

    public static $errInvalidUdid = 2001;//设备号错误

    public static $deviceNotOnline = 2007;//设备离线

    public static $cmdSendFaild = 2008;//命令发送失败


    public static function getErrMsg()
    {
        return [
            self::$deviceNotOnline => '设备离线',
            self::$cmdSendFaild => '命令发送失败',
            self::$errInvalidUdid => '设备号不正确',
            //self::$isChargingAndNeedWait => '充电口被占用，请换一个充电口或等待{mins}分钟',
        ];
    }


}