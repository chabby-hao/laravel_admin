<?php

namespace App\Models;

/**
 * App\Models\TZoneMsg
 *
 * @property int $mid
 * @property string $udid
 * @property int $zid
 * @property int $state
 * @property int $time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneMsg whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneMsg whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneMsg whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneMsg whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneMsg whereZid($value)
 * @mixin \Eloquent
 */
class TZoneMsg extends \App\Models\Base\TZoneMsg
{
	protected $fillable = [
		'udid',
		'zid',
		'state',
		'time'
	];
}
