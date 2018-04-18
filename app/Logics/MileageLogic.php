<?php

namespace App\Logics;


class MileageLogic extends BaseLogic
{
    const MAX_MILE = 100;//最大里程,超过这个都算异常里程

    const MILE_TYPE_ALL = 0;//全部
    const MILE_TYPE_NORMAL = 10;//正常
    const MILE_TYPE_ABNORMAL = 20;//异常

    public static function getMileMap()
    {
        $map = [
            self::MILE_TYPE_ALL => '全部里程',
            self::MILE_TYPE_ABNORMAL => '异常里程',
            self::MILE_TYPE_NORMAL => '正常里程',
        ];
        return $map;
    }
}