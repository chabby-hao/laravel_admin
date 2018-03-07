<?php

namespace App\Models;

/**
 * App\Models\TEvMileageGp
 *
 * @property string|null $udid
 * @property int $begin
 * @property int $end
 * @property int $duration
 * @property float $mile
 * @property int $power
 * @property string|null $points
 * @property int $mid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileageGp whereBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileageGp whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileageGp whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileageGp whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileageGp whereMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileageGp wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileageGp wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvMileageGp whereUdid($value)
 * @mixin \Eloquent
 */
class TEvMileageGp extends \App\Models\Base\TEvMileageGp
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
