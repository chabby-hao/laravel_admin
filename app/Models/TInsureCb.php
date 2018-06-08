<?php

namespace App\Models;

/**
 * App\Models\TInsureCb
 *
 * @property string $trade_no
 * @property string|null $pay_trade
 * @property string|null $order_id
 * @property float $amt
 * @property \Carbon\Carbon|null $pay_time
 * @property \Carbon\Carbon|null $order_time
 * @property string|null $pay_result
 * @property string|null $pay_channel
 * @property string|null $pay_user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb whereAmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb whereOrderTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb wherePayChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb wherePayResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb wherePayTrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb wherePayUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureCb whereTradeNo($value)
 * @mixin \Eloquent
 */
class TInsureCb extends \App\Models\Base\TInsureCb
{
	protected $fillable = [
		'pay_trade',
		'order_id',
		'amt',
		'pay_time',
		'order_time',
		'pay_result',
		'pay_channel',
		'pay_user'
	];
}
