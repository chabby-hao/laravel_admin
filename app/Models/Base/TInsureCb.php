<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureCb
 * 
 * @property string $trade_no
 * @property string $pay_trade
 * @property string $order_id
 * @property float $amt
 * @property \Carbon\Carbon $pay_time
 * @property \Carbon\Carbon $order_time
 * @property string $pay_result
 * @property string $pay_channel
 * @property string $pay_user
 *
 * @package App\Models\Base
 */
class TInsureCb extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_insure_cb';
	protected $primaryKey = 'trade_no';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'amt' => 'float'
	];

	protected $dates = [
		'pay_time',
		'order_time'
	];
}
