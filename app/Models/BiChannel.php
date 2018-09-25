<?php

namespace App\Models;
use App\Libs\Helper;

/**
 * App\Models\BiChannel
 *
 * @property int $id
 * @property string|null $channel_name 渠道名
 * @property string|null $channel_remark 备注
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannel whereChannelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannel whereChannelRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannel whereId($value)
 * @mixin \Eloquent
 */
class BiChannel extends \App\Models\Base\BiChannel
{
    protected $fillable = [
        'channel_name',
        'channel_remark'
    ];

    public static $cacheChannelMap = [];

    public static function getChannelMap($cache = false)
    {
        if($cache && self::$cacheChannelMap){
            return self::$cacheChannelMap;
        }

        $rs = self::orderByDesc('id')->get();
        $map = Helper::transToKeyValueArray($rs, 'id', 'channel_name');
        if($cache){
            self::$cacheChannelMap = $map;
        }
        return $map;
    }

    public static function getAllChannelIds()
    {
        $rs = self::get()->toArray();
        return Helper::transToOneDimensionalArray($rs, 'id');
    }

    public function getChannelid($Channelid){
        return $this->where('id',$Channelid)->first()->toArray();
    }
}
