<?php

namespace App\Models;

/**
 * App\Models\TEvChargeLog
 *
 * @property int $id
 * @property string $udid
 * @property string $imei
 * @property int $pre_v 充电前电门开最大电压
 * @property int $next_v 充电后电门开电压
 * @property int $umax 单电池满电电压
 * @property int $vmax 100%电量电压
 * @property int $create_time 添加时间
 * @property int $charge_time 充电时间
 * @property int $pre_time 上次满电时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog whereChargeTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog whereNextV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog wherePreTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog wherePreV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog whereUmax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvChargeLog whereVmax($value)
 * @mixin \Eloquent
 */
class TEvChargeLog extends \App\Models\Base\TEvChargeLog
{
	protected $fillable = [
		'udid',
		'imei',
		'pre_v',
		'next_v',
		'umax',
		'vmax',
		'create_time',
		'charge_time',
		'pre_time'
	];
}
