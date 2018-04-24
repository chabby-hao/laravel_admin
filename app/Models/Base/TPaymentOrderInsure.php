<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Apr 2018 16:16:54 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TPaymentOrderInsure
 * 
 * @property string $order_id
 * @property int $order_type
 * @property float $order_money
 * @property string $udid
 * @property int $uid
 * @property \Carbon\Carbon $create_time
 * @property \Carbon\Carbon $pay_time
 * @property int $status
 * @property int $mode
 * @property string $trade_no
 * @property string $atcode
 * @property int $is_activity
 *
 * @package App\Models\Base
 */
class TPaymentOrderInsure extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_payment_order_insure';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_type' => 'int',
		'order_money' => 'float',
		'uid' => 'int',
		'status' => 'int',
		'mode' => 'int',
		'is_activity' => 'int'
	];

	protected $dates = [
		'create_time',
		'pay_time'
	];
}
