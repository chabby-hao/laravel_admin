<?php

namespace App\Models;

/**
 * App\Models\TDeviceTmp
 *
 * @property string $udid
 * @property int $type 设备类型
 * @property int $ptype 产品类型
 * @property int $active 是否激活，0代表否，1代表是
 * @property int $pay 是否付费
 * @property int $expire
 * @property string|null $imei
 * @property string|null $imsi
 * @property int $device_type 0为正式设备，1为样品设备，2为测试设备
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp whereDeviceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp wherePay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp wherePtype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceTmp whereUdid($value)
 * @mixin \Eloquent
 */
class TDeviceTmp extends \App\Models\Base\TDeviceTmp
{
	protected $fillable = [
		'type',
		'ptype',
		'active',
		'pay',
		'expire',
		'imei',
		'imsi',
		'device_type'
	];
}
