<?php

namespace App\Models;

/**
 * App\Models\TDeviceLatest
 *
 * @property int $id 记录的id号
 * @property string $udid 设备唯一标识
 * @property int $stime 时间戳
 * @property float $lat GPS 经度
 * @property float $lng GPS 纬度
 * @property float $gsm_lat GSM 经度(有 GPS 经度，则不需要存
 * @property float $gsm_lng GSM 纬度(有 GPS 维度，则不需要存)
 * @property float $speed 速度
 * @property float $course 角度
 * @property int $gsm_signal GSM 信号强度(分档:0-10)
 * @property int $gps_signal GPS 信号强度 (分档:0-10）
 * @property bool $online 是否在线,(0:不在线,数据都无效,1:在线)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereGpsSignal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereGsmLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereGsmLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereGsmSignal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereStime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceLatest whereUdid($value)
 * @mixin \Eloquent
 */
class TDeviceLatest extends \App\Models\Base\TDeviceLatest
{
	protected $fillable = [
		'udid',
		'stime',
		'lat',
		'lng',
		'gsm_lat',
		'gsm_lng',
		'speed',
		'course',
		'gsm_signal',
		'gps_signal',
		'online'
	];
}
