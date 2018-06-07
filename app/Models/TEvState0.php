<?php

namespace App\Models;

/**
 * App\Models\TEvState0
 *
 * @property string $udid 设备号
 * @property int $create_time 时间戳
 * @property int $ev_key 电门
 * @property int $ev_lock 锁车
 * @property float $voltage 一线通电压
 * @property int $percent 一线通反馈电量百分比(格数/总格数)
 * @property int $mileage 一线通总里程
 * @property int $speed 一线通速度
 * @property int $gear 档位
 * @property int $local_voltage 本地电压
 * @property int $battery 备用电池电量
 * @property int $usb 备用电池是否在充电,大电瓶是否在位
 * @property int $instrument_status_code 仪表状态码
 * @property int $eBrake 电子刹车
 * @property int $limit_speed 限速
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereBattery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereEBrake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereEvKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereEvLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereGear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereInstrumentStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereLimitSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereLocalVoltage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereUsb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEvState0 whereVoltage($value)
 * @mixin \Eloquent
 */
class TEvState0 extends \App\Models\Base\TEvState0
{
	protected $fillable = [
		'ev_key',
		'ev_lock',
		'voltage',
		'percent',
		'mileage',
		'speed',
		'gear',
		'local_voltage',
		'battery',
		'usb',
		'instrument_status_code',
		'eBrake',
		'limit_speed'
	];
}
