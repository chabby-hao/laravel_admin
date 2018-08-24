<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:36:39 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiDeliveryDevice
 * 
 * @property int $id
 * @property int $delivery_order_id
 * @property string $imei
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiDeliveryDevice extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'delivery_order_id' => 'int'
	];
}
