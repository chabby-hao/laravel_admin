<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 14:54:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiDeliveryOrder
 * 
 * @property int $id
 * @property int $user_id
 * @property int $state
 * @property int $ship_no
 * @property int $order_id
 * @property string $part_number
 * @property int $fact_id
 * @property \Carbon\Carbon $delivery_date
 * @property int $delivery_quantity
 * @property int $brand_id
 * @property int $ebike_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiDeliveryOrder extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'user_id' => 'int',
		'state' => 'int',
		'ship_no' => 'int',
		'order_id' => 'int',
		'fact_id' => 'int',
		'delivery_quantity' => 'int',
		'brand_id' => 'int',
		'ebike_type_id' => 'int'
	];

	protected $dates = [
		'delivery_date'
	];
}
