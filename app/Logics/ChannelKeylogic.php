<?php

namespace App\Logics;


use App\Libs\Helper;
use App\Models\BiChannelSecret;
use Predis\Client;

class ChannelKeylogic extends BaseLogic
{

    const REDIS_HASH_CHANNEL_TO_CONFIG = 'channel_to_config';
    const REDIS_HASH_CHANNEL_TO_SECRET = 'channel_to_secret';

    public static function refreshAllConfig()
    {
        $datas = BiChannelSecret::select(['secret','channel_id','channel_name as channel','push_url'])->get()->toArray();
        $channelConfig = Helper::transToKeyToArray($datas, 'channel_id');
        $channelConfig = array_map(function($row){
            return json_encode($row);
        }, $channelConfig);
        $channelSecret = Helper::transToKeyValueArray($datas, 'channel', 'secret');

        RedisLogic::getRedis()->transaction(function ($tx) use ($channelConfig, $channelSecret) {
            /** @var Client $tx */
            $tx->del(self::REDIS_HASH_CHANNEL_TO_CONFIG);
            $tx->del(self::REDIS_HASH_CHANNEL_TO_SECRET);
            $tx->hmSet(self::REDIS_HASH_CHANNEL_TO_CONFIG, $channelConfig);
            $tx->hmSet(self::REDIS_HASH_CHANNEL_TO_SECRET, $channelSecret);
        });
    }



}