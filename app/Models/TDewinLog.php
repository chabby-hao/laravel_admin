<?php

namespace App\Models;

/**
 * App\Models\TDewinLog
 *
 * @property int $id
 * @property string $post_data 发送postdata的json格式
 * @property \Carbon\Carbon $last_time 最后更新时间
 * @property string $udid 设备号
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinLog whereLastTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinLog wherePostData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinLog whereUdid($value)
 * @mixin \Eloquent
 */
class TDewinLog extends \App\Models\Base\TDewinLog
{
	protected $fillable = [
		'post_data',
		'last_time',
		'udid'
	];
}
