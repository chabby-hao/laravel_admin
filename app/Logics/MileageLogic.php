<?php

namespace App\Logics;


use App\Models\TEvMileageGp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class MileageLogic extends BaseLogic
{

    const MAX_MILE = 100;//最大里程,超过这个都算异常里程

    const CACHE_KEY_MILE_TYPE_PRE = 'mile:';

    const MILE_TYPE_ALL = 0;//全部
    const MILE_TYPE_NORMAL = 10;//正常
    const MILE_TYPE_ABNORMAL = 20;//异常

    public static function getMileMap()
    {
        $map = [
            self::MILE_TYPE_ALL => '全部里程',
            self::MILE_TYPE_NORMAL => '正常里程',
            self::MILE_TYPE_ABNORMAL => '异常里程',
        ];
        return $map;
    }

    public static function getMileCountMap()
    {
        $time = Carbon::now()->addMinutes(30);
        //$time = Carbon::now()->addSeconds(10);
        $all = Cache::store('file')->remember(self::CACHE_KEY_MILE_TYPE_PRE . self::MILE_TYPE_ALL, $time, function(){
            return TEvMileageGp::count();
        });
        $normal = Cache::store('file')->remember(self::CACHE_KEY_MILE_TYPE_PRE . self::MILE_TYPE_NORMAL, $time, function(){
            return TEvMileageGp::where('mile', '<', self::MAX_MILE)->count();
        });
        $abnormal = Cache::store('file')->remember(self::CACHE_KEY_MILE_TYPE_PRE . self::MILE_TYPE_ABNORMAL, $time, function(){
            return TEvMileageGp::where('mile', '>=', self::MAX_MILE)->count();
        });

        //$all  = TEvMileageGp::whereBetween($whereBetween[0], $whereBetween[1])->where($where)->count();
        //$normal = TEvMileageGp::whereBetween($whereBetween[0], $whereBetween[1])->where($where)->where('mile', '<', self::MAX_MILE)->count();
        //$abnormal = TEvMileageGp::whereBetween($whereBetween[0], $whereBetween[1])->where($where)->where('mile', '>=', self::MAX_MILE)->count();

        $map = [
            self::MILE_TYPE_ALL=>$all,
            self::MILE_TYPE_NORMAL=>$normal,
            self::MILE_TYPE_ABNORMAL=>$abnormal,
        ];
        return $map;
    }
}