<?php

namespace App\Models;

/**
 * App\Models\TMessageLog
 *
 * @property int $id 记录的id号
 * @property string $udid 设备唯一标识
 * @property int $stime 状态发 时间戳
 * @property int $event_id 时间发生id,如1001:车辆异常震动
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TMessageLog whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TMessageLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TMessageLog whereStime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TMessageLog whereUdid($value)
 * @mixin \Eloquent
 */
class TMessageLog extends \App\Models\Base\TMessageLog
{
	protected $fillable = [
		'udid',
		'stime',
		'event_id'
	];
}
