<?php

namespace App\Objects;

class LocationObject extends BaseObject
{

    const TYPE_GPS = 'GPS';
    const TYPE_AGPS = 'AGPS';
    const TYPE_GPS_REPEAT = 'GPSREPEAT';


    public static function getLocationTypeMap()
    {
        $map = [
            self::TYPE_GPS => 'GPS定位',
            self::TYPE_AGPS => '基站定位',
            self::TYPE_GPS_REPEAT => 'GPS(repeat)',
        ];
        return $map;
    }
}