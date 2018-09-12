<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
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
 * @property int $battery_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereActuallDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereBatteryType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereDeliveryQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereEbikeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereFactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder wherePartNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereShipNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryOrder whereUserId($value)
 * @mixin \Eloquent
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
		'ebike_type_id' => 'int',
		'battery_type' => 'int'
	];

	protected $dates = [
		'delivery_date',
		'actuall_date'
	];
}
