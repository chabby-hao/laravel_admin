<?php

namespace App\Objects;

class LocationObject extends BaseObject
{

    const TYPE_GPS = 'GPS';
    const TYPE_AGPS = 'AGPS';
    const TYPE_GPS_REPEAT = 'GPSREPEAT';
    const TYPE_FAIL = 'FAIL';


    public static function getLocationTypeMap()
    {
        $map = [
            self::TYPE_GPS => 'GPS定位',
            self::TYPE_AGPS => '基站定位',
            self::TYPE_GPS_REPEAT => 'GPS(repeat)',
            self::TYPE_FAIL => '失败定位',
        ];
        return $map;
    }
}