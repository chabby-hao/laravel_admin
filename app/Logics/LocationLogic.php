<?php

namespace App\Logics;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LocationLogic extends BaseLogic
{

    private static function getLocationsNewFromDb($udid, $begin, $end)
    {
        $ret = [];
        $imei = DeviceLogic::getImei($udid);
        $date = date('Ymd', $begin);
        $date2 = date('Ymd', $end);
        $tables = [];
        if ($date == $date2) {
            $tables[] = 't_location_new_' . $date;
        } else {
            $tables[] = 't_location_new_' . $date;
            $tables[] = 't_location_new_' . $date2;
        }

        foreach ($tables as $table) {
            //$table = 't_location_new_' . $date;

            $rs = DB::connection('location')->select("select * from $table where udid='$imei' and `create_time` BETWEEN $begin and $end and type='GPS'");
            foreach ($rs as $row) {
                $row = (array)$row;

                $row['id'] = intval($row['location_id']);
                $row['time'] = intval($row['create_time']);
                $row['speed'] = intval($row['pace']);

                $ret[] = $row;
            }
        }

        return $ret;
    }

    private static function getLocationsOldFromDb($udid, $date)
    {
        $ret = [];

        $imei = DeviceLogic::getImei($udid);
        $table = 't_location_' . $date;

        if (!Schema::hasTable($table)) {
            return $ret;
        }

        $locations = DB::table($table)->where("udid = '" . $imei . "'")->orderBy('time')->get()->toArray();

        foreach ($locations as $location) {
            $location['id'] = $location['lid'];
            $ret[] = $location;
        }
        return $ret;
    }

    private static function getLocationOldListFromDb($udid, $beginTime, $endTime)
    {
        $ret = [];

        $date = Carbon::createFromTimestamp($beginTime)->toDateString();

        $imei = DeviceLogic::getImei($udid);
        $table = 't_location_' . $date;

        if (!Schema::hasTable($table)) {
            return $ret;
        }

        $locations = DB::table($table)->where("udid = '$imei' and time >= $beginTime and time <= $endTime")->orderBy('time')->get()->toArray();

        foreach ($locations as $location) {
            $location['id'] = $location['lid'];
            $ret[] = $location;
        }
        return $ret;
    }

    public static function getLocationHistoryFromDb($udid, $date)
    {
        $begin = strtotime($date . ' 00:00:00');
        $end = strtotime($date . ' 23:59:59');
        return self::getLocationsNewFromDb($udid, $begin, $end);
        /*if (DeviceLogic::isEb001b($udid) || $date > '20170927') {
            $begin = strtotime($date . ' 00:00:00');
            $end = strtotime($date . ' 23:59:59');
            return self::getLocationsNewFromDb($udid, $begin, $end);
        } else {
            return self::getLocationsOldFromDb($udid, $date);
        }*/
    }

    public static function getLocationListFromDb($udid, $beginTime, $endTime)
    {
        return self::getLocationsNewFromDb($udid, $beginTime, $endTime);
        /*if(DeviceLogic::isEb001b($udid)){
            return self::getLocationsNewFromDb($udid, $beginTime, $endTime);
        }else{
            return self::getLocationOldListFromDb($udid, $beginTime, $endTime);
        }*/
    }

    public static function getLocationListByDate($udid, $date)
    {

        $imei = DeviceLogic::getImei($udid);

        //优先从Redis缓存中获取天数据
        $key = 'loc_day:' . $imei . '_' . $date;
        $locations = RedisLogic::sMembers($key);
        foreach ($locations as $locId) {
            $location = RedisLogic::getLocationByLid($locId);
            if (!$location) {
                continue;
            }

            if ($location['type'] == 'AGPS') {
                continue;
            }

            $ret[] = $location;
        }

        //Redis缓存不存在指定天数据，则从Mysql转储数据库中获取
        if (empty($ret)) {
            $ret = self::getLocationHistoryFromDb($udid, $date);
        }

        return $ret;
    }

    public static function getLocationList($udid, $time, $endTime = null)
    {
        $ret = array();

        $imei = DeviceLogic::getImei($udid);

        $endTime = $endTime ?: time();

        $key = 'dev_loc:' . $imei;
        $locations = RedisLogic::zRangeByScore($key,
            $time + 1, $endTime);

        foreach ($locations as $locId) {
            $location = RedisLogic::getLocationByLid($locId);
            if (!$location) {
                continue;
            }

            //GPS足迹点过滤
            if ($location['type'] == 'AGPS') {
                continue;
            }

            $ret[] = $location;
        }

        if(!$ret){
            return self::getLocationListFromDb($udid, $time, $endTime);
        }

        return $ret;
        //return $this->filterLocation($ret);
    }

}