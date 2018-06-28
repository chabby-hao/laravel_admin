<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvMileage
 *
 * @property string $udid
 * @property int $begin
 * @property int $end
 * @property int $duration
 * @property int $mile
 * @property int $power
 * @property string $points
 * @property int $mid
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileage whereBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileage whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileage whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileage whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileage whereMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileage wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileage wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvMileage whereUdid($value)
 * @mixin \Eloquent
 */
class TEvMileage extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_mileage';
	protected $primaryKey = 'mid';
	public $timestamps = false;

	protected $casts = [
		'begin' => 'int',
		'end' => 'int',
		'duration' => 'int',
		'mile' => 'int',
		'power' => 'int'
	];
}
