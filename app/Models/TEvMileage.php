<?php

namespace App\Models;

/**
 * App\Models\TEvMileage
 *
 * @property string|null $udid
 * @property int $begin
 * @property int $end
 * @property int $duration
 * @property int $mile
 * @property int $power
 * @property string|null $points
 * @property int $mid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileage whereBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileage whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileage whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileage whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileage whereMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileage wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileage wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileage whereUdid($value)
 * @mixin \Eloquent
 */
class TEvMileage extends \App\Models\Base\TEvMileage
{
	protected $fillable = [
		'udid',
		'begin',
		'end',
		'duration',
		'mile',
		'power',
		'points'
	];
}
