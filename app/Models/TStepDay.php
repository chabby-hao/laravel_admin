<?php

namespace App\Models;

/**
 * App\Models\TStepDay
 *
 * @property string $udid
 * @property int $ymd
 * @property int $step
 * @property int $update_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepDay whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepDay whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepDay whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepDay whereYmd($value)
 * @mixin \Eloquent
 */
class TStepDay extends \App\Models\Base\TStepDay
{
	protected $fillable = [
		'step',
		'update_time'
	];
}
