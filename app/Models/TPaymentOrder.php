<?php

namespace App\Models;

/**
 * App\Models\TPaymentOrder
 *
 * @property string $order_id
 * @property int $order_type
 * @property float $order_money
 * @property string $udid
 * @property int $uid
 * @property \Carbon\Carbon|null $create_time
 * @property \Carbon\Carbon|null $pay_time
 * @property int $status 1=已支付
 * @property int $mode
 * @property string|null $trade_no
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereOrderMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPaymentOrder whereUid($value)
 * @mixin \Eloquent
 */
class TPaymentOrder extends \App\Models\Base\TPaymentOrder
{

    const PAY_STATUS_INIT = 0;//未支付
    const PAY_STATUS_PAY = 1;//已支付

	protected $fillable = [
		'order_type',
		'order_money',
		'udid',
		'uid',
		'create_time',
		'pay_time',
		'status',
		'mode',
		'trade_no'
	];
}
