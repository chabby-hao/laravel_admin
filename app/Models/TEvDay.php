<?php

namespace App\Models;

/**
 * App\Models\TEvDay
 *
 * @property string $udid 设备UDID
 * @property int $day 日期
 * @property float $mile 行驶里程
 * @property int $minutes 行驶时长
 * @property float $energy 能耗
 * @property int $seconds
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDay whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDay whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDay whereMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDay whereMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDay whereSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvDay whereUdid($value)
 * @mixin \Eloquent
 */
class TEvDay extends \App\Models\Base\TEvDay
{
	protected $fillable = [
		'mile',
		'minutes',
		'energy',
		'seconds'
	];
}
