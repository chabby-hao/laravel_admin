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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour15($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour16($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour17($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour18($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour19($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour21($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour22($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour23($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour24($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereHour9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepHour whereYmd($value)
 * @mixin \Eloquent
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
