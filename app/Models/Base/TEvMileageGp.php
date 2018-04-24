<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Apr 2018 16:16:54 +0800.
 */

namespace App\Models\Base;

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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileageGp whereBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileageGp whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileageGp whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileageGp whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileageGp whereMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileageGp wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileageGp wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileageGp whereUdid($value)
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
}
