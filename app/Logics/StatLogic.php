<?php

namespace App\Logics;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class StatLogic extends BaseLogic
{

    /**
     * @param $keyPre string 渠道|客户|场景
     * @param $id
     * @param $data
     */
    public static function setDailyActiveData($keyPre, $id, $data)
    {
        $cacheTime = Carbon::now()->addDay();
        Cache::store('redis')->put('daily_active:' . $keyPre . $id, $data, $cacheTime);
    }

    /**
     * @param $keyPre
     * @param int $id  0=全部
     */
    public static function getDailyActiveData($keyPre, $id = 0)
    {
        return Cache::store('redis')->get('daily_active:' . $keyPre . $id);
    }

}