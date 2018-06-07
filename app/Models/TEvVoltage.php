<?php

namespace App\Models;

/**
 * App\Models\TEvVoltage
 *
 * @property string $udid
 * @property int $mid
 * @property int $mid_time
 * @property \Carbon\Carbon|null $refresh_time
 * @property int $vol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvVoltage whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvVoltage whereMidTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvVoltage whereRefreshTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvVoltage whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvVoltage whereVol($value)
 * @mixin \Eloquent
 */
class TEvVoltage extends \App\Models\Base\TEvVoltage
{
	protected $fillable = [
		'mid',
		'mid_time',
		'refresh_time',
		'vol'
	];
}
