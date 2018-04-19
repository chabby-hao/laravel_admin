<?php

namespace App\Logics;


use App\Models\TEvMileageGp;
use App\Models\TUserMsg;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class MsgLogic extends BaseLogic
{

    public static function getMsgTypeCount($udid, $type)
    {
        return TUserMsg::whereSource($udid)->whereType($type)->count();
    }

}