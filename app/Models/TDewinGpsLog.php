<?php

namespace App\Models;

/**
 * App\Models\TDewinGpsLog
 *
 * @property int $id
 * @property string $udid
 * @property float $lat
 * @property float $lng
 * @property int $create_time
 * @property int $add_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinGpsLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinGpsLog whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinGpsLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinGpsLog whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinGpsLog whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinGpsLog whereUdid($value)
 * @mixin \Eloquent
 */
class TDewinGpsLog extends \App\Models\Base\TDewinGpsLog
{
	protected $fillable = [
		'udid',
		'lat',
		'lng',
		'create_time',
		'add_time'
	];
}
