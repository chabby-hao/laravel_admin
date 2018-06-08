<?php

namespace App\Models;

/**
 * App\Models\TEvSituation
 *
 * @property string $udid
 * @property int $code 检测结果代码
 * @property int $check_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvSituation whereCheckTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvSituation whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvSituation whereUdid($value)
 * @mixin \Eloquent
 */
class TEvSituation extends \App\Models\Base\TEvSituation
{
	protected $fillable = [
		'code',
		'check_time'
	];
}
