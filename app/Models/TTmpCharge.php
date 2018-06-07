<?php

namespace App\Models;

/**
 * App\Models\TTmpCharge
 *
 * @property int $id
 * @property string|null $BMSID
 * @property string|null $IMEID
 * @property string|null $IMSID
 * @property string|null $total
 * @property string|null $type
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $start_rank
 * @property string|null $end_rank
 * @property string|null $start_time
 * @property string|null $time_segment
 * @property string|null $code
 * @property string|null $volume
 * @property string|null $direct
 * @property string|null $sign
 * @property string|null $method
 * @property \Carbon\Carbon|null $add_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereBMSID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereDirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereEndRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereIMEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereIMSID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereStartRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereTimeSegment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTmpCharge whereVolume($value)
 * @mixin \Eloquent
 */
class TTmpCharge extends \App\Models\Base\TTmpCharge
{
	protected $fillable = [
		'BMSID',
		'IMEID',
		'IMSID',
		'total',
		'type',
		'longitude',
		'latitude',
		'start_rank',
		'end_rank',
		'start_time',
		'time_segment',
		'code',
		'volume',
		'direct',
		'sign',
		'method',
		'add_time'
	];
}
