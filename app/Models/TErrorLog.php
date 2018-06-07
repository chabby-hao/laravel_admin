<?php

namespace App\Models;

/**
 * App\Models\TErrorLog
 *
 * @property int $id
 * @property string|null $d_code 设备号
 * @property string|null $msg
 * @property int $log_time 设备日志记录时间
 * @property int $add_time 数据库插入时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TErrorLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TErrorLog whereDCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TErrorLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TErrorLog whereLogTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TErrorLog whereMsg($value)
 * @mixin \Eloquent
 */
class TErrorLog extends \App\Models\Base\TErrorLog
{
	protected $fillable = [
		'd_code',
		'msg',
		'log_time',
		'add_time'
	];
}
