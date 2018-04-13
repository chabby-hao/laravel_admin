<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Apr 2018 16:11:32 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiDeliveryOrder
 * 
 * @property int $id
 * @property int $user_id
 * @property int $state
 * @property string $ship_no
 * @property int $order_id
 * @property string $part_number
 * @property int $fact_id
 * @property \Carbon\Carbon $delivery_date
 * @property \Carbon\Carbon $actuall_date
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
		'order_id' => 'int',
		'fact_id' => 'int',
		'delivery_quantity' => 'int',
		'brand_id' => 'int',
		'ebike_type_id' => 'int'
	];

	protected $dates = [
		'delivery_date',
		'actuall_date'
	];
}
