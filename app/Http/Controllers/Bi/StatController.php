<?php

namespace App\Http\Controllers\Bi;


use App\Libs\Helper;
use App\Logics\RedisLogic;
use App\Models\TStatDevice;

class StatController extends BaseController
{
    /**
     * 获取请求数量
     */
    public function requestCount()
    {
        //$sum = TStatDevice::sum('request_count_today');
        $sum = RedisLogic::hGet('total_status','requestCounts');
        $sum = number_format($sum);
        $sum = '0' . $sum;
        $sum = str_split($sum);
        return Helper::response(['sum'=>$sum]);
    }
}
