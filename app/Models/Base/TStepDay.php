<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TStepDay
 *
 * @property string $udid
 * @property int $ymd
 * @property int $step
 * @property int $update_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepDay whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepDay whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepDay whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepDay whereYmd($value)
 * @mixin \Eloquent
 */
class TStepDay extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_step_day';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ymd' => 'int',
		'step' => 'int',
		'update_time' => 'int'
	];
}
