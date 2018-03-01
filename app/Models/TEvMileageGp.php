<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Feb 2018 03:36:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvMileageGp
 *
 * @property string $udid
 * @property int $begin
 * @property int $end
 * @property int $duration
 * @property float $mile
 * @property int $power
 * @property string $points
 * @property int $mid
 * @package App\Models
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
class TEvMileageGp extends Eloquent
{
	protected $connection = 'care';
	protected $primaryKey = 'mid';
	public $timestamps = false;

	protected $casts = [
		'begin' => 'int',
		'end' => 'int',
		'duration' => 'int',
		'mile' => 'float',
		'power' => 'int'
	];

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
