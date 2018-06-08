<?php

namespace App\Models;

/**
 * App\Models\TInsureOrderAppend
 *
 * @property string $atcode 激活码
 * @property int $uid 用户id
 * @property string $udid 设备码
 * @property int $create_time
 * @property int $expire_time 预订单过期时间 在create_time基础上加15天
 * @property int $insure_time 投保时间
 * @property int $status 1-预订单状态   2-已完成
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderAppend whereAtcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderAppend whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderAppend whereExpireTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderAppend whereInsureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderAppend whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderAppend whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderAppend whereUid($value)
 * @mixin \Eloquent
 */
class TInsureOrderAppend extends \App\Models\Base\TInsureOrderAppend
{
	protected $fillable = [
		'uid',
		'udid',
		'create_time',
		'expire_time',
		'insure_time',
		'status'
	];
}
