<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TStepHour
 * 
 * @property string $udid
 * @property int $ymd
 * @property int $total
 * @property int $hour_1
 * @property int $hour_2
 * @property int $hour_3
 * @property int $hour_4
 * @property int $hour_5
 * @property int $hour_6
 * @property int $hour_7
 * @property int $hour_8
 * @property int $hour_9
 * @property int $hour_10
 * @property int $hour_11
 * @property int $hour_12
 * @property int $hour_13
 * @property int $hour_14
 * @property int $hour_15
 * @property int $hour_16
 * @property int $hour_17
 * @property int $hour_18
 * @property int $hour_19
 * @property int $hour_20
 * @property int $hour_21
 * @property int $hour_22
 * @property int $hour_23
 * @property int $hour_24
 *
 * @package App\Models\Base
 */
class TStepHour extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_step_hour';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ymd' => 'int',
		'total' => 'int',
		'hour_1' => 'int',
		'hour_2' => 'int',
		'hour_3' => 'int',
		'hour_4' => 'int',
		'hour_5' => 'int',
		'hour_6' => 'int',
		'hour_7' => 'int',
		'hour_8' => 'int',
		'hour_9' => 'int',
		'hour_10' => 'int',
		'hour_11' => 'int',
		'hour_12' => 'int',
		'hour_13' => 'int',
		'hour_14' => 'int',
		'hour_15' => 'int',
		'hour_16' => 'int',
		'hour_17' => 'int',
		'hour_18' => 'int',
		'hour_19' => 'int',
		'hour_20' => 'int',
		'hour_21' => 'int',
		'hour_22' => 'int',
		'hour_23' => 'int',
		'hour_24' => 'int'
	];
}
