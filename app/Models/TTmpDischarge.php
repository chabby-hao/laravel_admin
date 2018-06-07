<?php

namespace App\Models;

/**
 * App\Models\TTmpDischarge
 *
 * @property int $id
 * @property string|null $BMSID
 * @property string|null $IMEID
 * @property string|null $IMSID
 * @property string|null $type
 * @property string|null $start_voltage
 * @property string|null $end_voltage
 * @property string|null $index
 * @property string|null $volume
 * @property string|null $direct
 * @property string|null $sign
 * @property string|null $method
 * @property \Carbon\Carbon|null $add_time
 * @property string|null $time_segment
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereBMSID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereDirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereEndVoltage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereIMEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereIMSID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereStartVoltage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereTimeSegment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpDischarge whereVolume($value)
 * @mixin \Eloquent
 */
class TTmpDischarge extends \App\Models\Base\TTmpDischarge
{
	protected $fillable = [
		'BMSID',
		'IMEID',
		'IMSID',
		'type',
		'start_voltage',
		'end_voltage',
		'index',
		'volume',
		'direct',
		'sign',
		'method',
		'add_time',
		'time_segment'
	];
}
