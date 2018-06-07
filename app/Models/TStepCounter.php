<?php

namespace App\Models;

/**
 * App\Models\TStepCounter
 *
 * @property string $udid
 * @property int $time
 * @property int $counter
 * @property int $total
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepCounter whereCounter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepCounter whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepCounter whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepCounter whereUdid($value)
 * @mixin \Eloquent
 */
class TStepCounter extends \App\Models\Base\TStepCounter
{
	protected $fillable = [
		'time',
		'counter',
		'total'
	];
}
