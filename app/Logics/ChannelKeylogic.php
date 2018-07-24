<?php

namespace App\Logics;


use App\Libs\Helper;
use App\Models\BiChannelSecret;

class ChannelKeylogic extends BaseLogic
{

    const REDIS_HASH_KEY = 'channel_secret';

    public static function refreshAllConfig()
    {
        $datas = BiChannelSecret::select(['secret','channel_id','channel_name'])->get()->toArray();
        $datas = Helper::transToKeyToArray($datas, 'channel_id');
        return RedisLogic::hmSet(self::REDIS_HASH_KEY, $datas);
    }



}