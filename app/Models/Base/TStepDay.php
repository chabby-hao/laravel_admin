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
 *
 * @package App\Models\Base
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
