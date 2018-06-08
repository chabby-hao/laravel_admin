<?php

namespace App\Models;

/**
 * App\Models\TDewinBasicLog
 *
 * @property int $id
 * @property string $udid
 * @property int $status 1-骑行，2-停车，3-电瓶断开
 * @property int $is_online 1-在线，2-离线
 * @property int $c_total_mileage
 * @property int $total_mileage
 * @property int $charge_number
 * @property \Carbon\Carbon $create_time
 * @property string $json_post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereCTotalMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereChargeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereJsonPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereTotalMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinBasicLog whereUdid($value)
 * @mixin \Eloquent
 */
class TDewinBasicLog extends \App\Models\Base\TDewinBasicLog
{
	protected $fillable = [
		'udid',
		'status',
		'is_online',
		'c_total_mileage',
		'total_mileage',
		'charge_number',
		'create_time',
		'json_post'
	];
}
