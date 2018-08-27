<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 27 Aug 2018 16:44:42 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiOrder
 * 
 * @property int $id
 * @property int $user_id
 * @property string $order_no
 * @property int $state
 * @property int $channel_id
 * @property int $customer_id
 * @property int $scene_id
 * @property int $order_quantity
 * @property int $device_type
 * @property \Carbon\Carbon $expect_delivery
 * @property int $after_sale
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $remark
 * @property int $ship_quantity
 * @property int $actuall_quantity
 *
 * @package App\Models\Base
 */
class BiOrder extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'user_id' => 'int',
		'state' => 'int',
		'channel_id' => 'int',
		'customer_id' => 'int',
		'scene_id' => 'int',
		'order_quantity' => 'int',
		'device_type' => 'int',
		'after_sale' => 'int',
		'ship_quantity' => 'int',
		'actuall_quantity' => 'int'
	];

	protected $dates = [
		'expect_delivery'
	];
}
