<?php

namespace App\Models;

/**
 * App\Models\TEvCharge
 *
 * @property string $udid
 * @property int $mid
 * @property int $mid_time
 * @property \Carbon\Carbon|null $refresh_time
 * @property int $cycle 电池充电次数
 * @property int $vol
 * @property int $prevol 上一次从t_ev_state计算的最后一次电压值
 * @property int $loop 电池循环次数
 * @property int $loop_mid 电池循环次数最后一次t_ev_mileage 的mid
 * @property int $loop_last_mile 上一次剩余里程
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereLoop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereLoopLastMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereLoopMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereMidTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge wherePrevol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereRefreshTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvCharge whereVol($value)
 * @mixin \Eloquent
 */
class TEvCharge extends \App\Models\Base\TEvCharge
{
	protected $fillable = [
		'mid',
		'mid_time',
		'refresh_time',
		'cycle',
		'vol',
		'prevol',
		'loop',
		'loop_mid',
		'loop_last_mile'
	];
}
