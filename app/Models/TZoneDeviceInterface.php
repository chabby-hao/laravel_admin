<?php

namespace App\Models;

/**
 * App\Models\TZoneDeviceInterface
 *
 * @property int $id
 * @property int $type 1-dewin
 * @property string $udid
 * @property int $add_time
 * @property int $zid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneDeviceInterface whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneDeviceInterface whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneDeviceInterface whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneDeviceInterface whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneDeviceInterface whereZid($value)
 * @mixin \Eloquent
 */
class TZoneDeviceInterface extends \App\Models\Base\TZoneDeviceInterface
{
	protected $fillable = [
		'type',
		'udid',
		'add_time',
		'zid'
	];
}
