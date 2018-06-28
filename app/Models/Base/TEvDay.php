<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvDay
 *
 * @property string $udid
 * @property int $day
 * @property float $mile
 * @property int $minutes
 * @property float $energy
 * @property int $seconds
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvDay whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvDay whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvDay whereMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvDay whereMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvDay whereSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvDay whereUdid($value)
 * @mixin \Eloquent
 */
class TEvDay extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_day';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'day' => 'int',
		'mile' => 'float',
		'minutes' => 'int',
		'energy' => 'float',
		'seconds' => 'int'
	];
}
