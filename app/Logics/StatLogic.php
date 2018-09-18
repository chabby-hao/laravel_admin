<?php

namespace App\Logics;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class StatLogic extends BaseLogic
{

    /**
     * 日活跃
     * @param $keypre string 渠道|客户|场景
     * @param $id
     * @param $data
     */
    public static function setDailyActive($data, $keypre, $id)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('daily_active:' . $keypre . $id, $data, $cacheTime);
    }

    /**
     * 日活跃
     * @param $keypre
     * @param int $id 0=全部
     */
    public static function getDailyActive($keypre, $id = 0)
    {
        return Cache::store('redis')->get('daily_active:' . $keypre . $id);
    }


    public static function setTravelTimes($data, $keypre, $id)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('travel_times:' . $keypre . $id, $data, $cacheTime);
    }

    /**
     * 出行次数
     * @param $keypre
     * @param int $id
     * @return mixed
     */
    public static function getTravelTimes($keypre, $id = 0)
    {
        return Cache::store('redis')->get('travel_times:' . $keypre . $id);
    }

    public static function setTravelFrequency($data, $keypre, $id)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('travel_frequency:' . $keypre . $id, $data, $cacheTime);
    }

    /**
     * 出行频次
     * @param $keypre
     * @param int $id
     * @return mixed
     */
    public static function getTravelFrequency($keypre, $id = 0)
    {
        return Cache::store('redis')->get('travel_frequency:' . $keypre . $id);
    }

    public static function setTripDistance($data, $keypre, $id)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('trip_distance:' . $keypre . $id, $data, $cacheTime);
    }

    /**
     * 出行距离
     * @param $keypre
     * @param int $id
     * @return mixed
     */
    public static function getTripDistance($keypre, $id = 0)
    {
        return Cache::store('redis')->get('trip_distance:' . $keypre . $id);
    }

    public static function setActiveGeographicalDistribution($data, $keypre, $id)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('active_geographical_distribution:' . $keypre . $id, $data, $cacheTime);
    }

    /**
     * 活跃车辆地理分布
     * @param $keypre
     * @param int $id
     * @return mixed
     */
    public static function getActiveGeographicalDistribution($keypre, $id = 0)
    {
        return Cache::store('redis')->get('active_geographical_distribution:' . $keypre . $id);
    }

    public static function setVehicleDistribution($data, $keypre, $id)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('vehicle_distribution:' . $keypre . $id, $data, $cacheTime);
    }

    /**
     * 车型分布
     * @param $keypre
     * @param int $id
     * @return mixed
     */
    public static function getVehicleDistribution($keypre, $id = 0)
    {
        return Cache::store('redis')->get('vehicle_distribution:' . $keypre . $id);
    }

    public static function setActiveCurve($data, $keypre, $id)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('active_curve:' . $keypre . $id, $data, $cacheTime);
    }

    /**
     * 活跃曲线图
     * @param $keypre
     * @param int $id
     * @return mixed
     */
    public static function getActiveCurve($keypre, $id = 0)
    {
        return Cache::store('redis')->get('active_curve:' . $keypre . $id);
    }

    public static function setTripFrequencyDistribution($data, $keypre, $id)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('trip_frequency_distribution:' . $keypre . $id, $data, $cacheTime);
    }

    /**
     * 出行次数分布
     * @param $keypre
     * @param int $id
     * @return mixed
     */
    public static function getTripFrequencyDistribution($keypre, $id = 0)
    {
        return Cache::store('redis')->get('trip_frequency_distribution:' . $keypre . $id);
    }

    public static function setBatteryQuantities($data, $keypre, $id = 0)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('batteryQuantities:' . $keypre . $id, $data, $cacheTime);
    }

    public static function getBatteryQuantities($keypre, $id = 0)
    {
        return Cache::store('redis')->get('batteryQuantities:' . $keypre . $id);
    }


}