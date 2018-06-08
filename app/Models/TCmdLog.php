<?php

namespace App\Models;

/**
 * App\Models\TCmdLog
 *
 * @property int $id
 * @property string $cmd 命令
 * @property int $type 0=远程，1=蓝牙
 * @property \Carbon\Carbon|null $add_time
 * @property string|null $imei
 * @property string|null $channel 操作渠道
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TCmdLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TCmdLog whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TCmdLog whereCmd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TCmdLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TCmdLog whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TCmdLog whereType($value)
 * @mixin \Eloquent
 */
class TCmdLog extends \App\Models\Base\TCmdLog
{
	protected $fillable = [
		'cmd',
		'type',
		'add_time',
		'imei',
		'channel'
	];
}
