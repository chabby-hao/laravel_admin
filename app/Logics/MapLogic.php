<?php

namespace App\Logics;


use App\Models\TEvMileageGp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class MapLogic extends BaseLogic
{

    public static function getMapLoc($udid)
    {
        $gps = DeviceLogic::getLastLocationInfoByUdid($udid);
        if (!$gps['time']) {
            return [];
        }
        $data = [
            'name' => $udid,
            'value' => [
                floatval($gps['lng']),
                floatval($gps['lat']),
                //1,//数量
            ],
            'time' => date('Y-m-d H:i', $gps['time']),
            'address' => $gps['address'] ?: '无',
        ];
        //echo "loc : $udid get success" . "\n";
        return $data;
    }
}