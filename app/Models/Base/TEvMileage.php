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
 *
 * @package App\Models\Base
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
