<?php

namespace App\Models;

/**
 * App\Models\TEvDayTest
 *
 * @property string $udid 设备UDID
 * @property int $day 日期
 * @property float $mile 行驶里程
 * @property int $minutes 行驶时长
 * @property float $energy 能耗
 * @property int $seconds
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDayTest whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDayTest whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDayTest whereMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDayTest whereMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDayTest whereSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDayTest whereUdid($value)
 * @mixin \Eloquent
 */
class TEvDayTest extends \App\Models\Base\TEvDayTest
{
	protected $fillable = [
		'mile',
		'minutes',
		'energy',
		'seconds'
	];
}
