<?php

namespace App\Http\Controllers\Bi;


use App\Libs\Helper;
use App\Models\TStatDevice;

class StatController extends BaseController
{
    /**
     * 获取请求数量
     */
    public function requestCount()
    {
        $sum = TStatDevice::sum('request_count_today');
        $sum = str_split($sum);
        return Helper::response(['sum'=>$sum]);
    }
}
