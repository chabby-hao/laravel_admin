<?php

namespace App\Models;

/**
 * App\Models\TPaymentOrderInsure
 *
 * @property string $order_id
 * @property int $order_type
 * @property float $order_money
 * @property string $udid
 * @property int $uid
 * @property \Carbon\Carbon|null $create_time
 * @property \Carbon\Carbon|null $pay_time
 * @property int $status
 * @property int $mode
 * @property string|null $trade_no
 * @property string|null $atcode 保险激活码，只有支付成功才有
 * @property int $is_activity 是否活动购买，0=不是，1=是
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereAtcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereIsActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereOrderMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrderInsure whereUid($value)
 * @mixin \Eloquent
 */
class TPaymentOrderInsure extends \App\Models\Base\TPaymentOrderInsure
{
	protected $fillable = [
		'order_type',
		'order_money',
		'udid',
		'uid',
		'create_time',
		'pay_time',
		'status',
		'mode',
		'trade_no',
		'atcode',
		'is_activity'
	];
}
