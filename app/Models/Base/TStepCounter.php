<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TStepCounter
 *
 * @property string $udid
 * @property int $time
 * @property int $counter
 * @property int $total
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepCounter whereCounter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepCounter whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepCounter whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepCounter whereUdid($value)
 * @mixin \Eloquent
 */
class TStepCounter extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_step_counter';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'time' => 'int',
		'counter' => 'int',
		'total' => 'int'
	];
}
