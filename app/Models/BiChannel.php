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

    public static function getChannelMap()
    {
        $rs = self::orderByDesc('id')->get();
        return Helper::transToKeyValueArray($rs, 'id', 'channel_name');
    }
}
