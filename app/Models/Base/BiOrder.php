<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 16:52:59 +0800.
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
 * @property int $order_quantity
 * @property int $device_type
 * @property \Carbon\Carbon $expect_delivery
 * @property int $after_sale
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $remark
 * @property int $ship_quantity
 * @property int $actuall_quantity
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereActuallQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereAfterSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereDeviceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereExpectDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereOrderQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereShipQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiOrder whereUserId($value)
 * @mixin \Eloquent
 */
class BiOrder extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'user_id' => 'int',
		'state' => 'int',
		'channel_id' => 'int',
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
