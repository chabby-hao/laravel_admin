<?php

namespace App\Models;

/**
 * App\Models\TEvFault
 *
 * @property string $udid
 * @property string $create_time
 * @property int $power
 * @property int $control
 * @property int $cruise
 * @property int $hall
 * @property int $block
 * @property int $low
 * @property int $switch
 * @property int $phase
 * @property int $ocp
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereCruise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereHall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereLow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereOcp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault wherePhase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereSwitch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvFault whereUdid($value)
 * @mixin \Eloquent
 */
class TEvFault extends \App\Models\Base\TEvFault
{
	protected $fillable = [
		'power',
		'control',
		'cruise',
		'hall',
		'block',
		'low',
		'switch',
		'phase',
		'ocp'
	];
}
