<?php

namespace App\Models;

/**
 * App\Models\TDeviceFootmark
 *
 * @property string $udid
 * @property int $year
 * @property int $month
 * @property int $days
 * @property int $gps
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFootmark whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFootmark whereGps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFootmark whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFootmark whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFootmark whereYear($value)
 * @mixin \Eloquent
 */
class TDeviceFootmark extends \App\Models\Base\TDeviceFootmark
{
	protected $fillable = [
		'days',
		'gps'
	];
}
