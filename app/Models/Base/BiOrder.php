<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Mar 2018 17:51:18 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiOrder
 * 
 * @property int $id
 * @property int $state
 * @property int $channel_id
 * @property int $order_quantity
 * @property int $product_type
 * @property \Carbon\Carbon $expect_delivery
 * @property int $after_sale
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $remark
 *
 * @package App\Models\Base
 */
class BiOrder extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'state' => 'int',
		'channel_id' => 'int',
		'order_quantity' => 'int',
		'product_type' => 'int',
		'after_sale' => 'int'
	];

	protected $dates = [
		'expect_delivery'
	];
}
