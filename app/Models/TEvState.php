<?php

namespace App\Models;

/**
 * App\Models\TEvState
 *
 * @property string $udid
 * @property int $create_time
 * @property int $ev_key
 * @property int $ev_lock
 * @property float $voltage
 * @property int $percent
 * @property int $mileage
 * @property int $speed
 * @property int $gear
 * @property int $local_voltage
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereEvKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereEvLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereGear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereLocalVoltage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState whereVoltage($value)
 * @mixin \Eloquent
 */
class TEvState extends \App\Models\Base\TEvState
{
	protected $fillable = [
		'ev_key',
		'ev_lock',
		'voltage',
		'percent',
		'mileage',
		'speed',
		'gear',
		'local_voltage'
	];
}
