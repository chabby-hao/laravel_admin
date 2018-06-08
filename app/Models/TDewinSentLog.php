<?php

namespace App\Models;

/**
 * App\Models\TDewinSentLog
 *
 * @property int $id
 * @property string $post_data 发送postdata的json格式
 * @property \Carbon\Carbon $sent_time 最后更新时间
 * @property string $udid 设备号
 * @property int $total_mileage
 * @property int $gps_mileage
 * @property int $charge_number
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinSentLog whereChargeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinSentLog whereGpsMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinSentLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinSentLog wherePostData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinSentLog whereSentTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinSentLog whereTotalMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinSentLog whereUdid($value)
 * @mixin \Eloquent
 */
class TDewinSentLog extends \App\Models\Base\TDewinSentLog
{
	protected $fillable = [
		'post_data',
		'sent_time',
		'udid',
		'total_mileage',
		'gps_mileage',
		'charge_number'
	];
}
