<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvDayTest
 * 
 * @property string $udid
 * @property int $day
 * @property float $mile
 * @property int $minutes
 * @property float $energy
 * @property int $seconds
 *
 * @package App\Models\Base
 */
class TEvDayTest extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_day_test';
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
