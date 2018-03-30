<?php

namespace App\Models;

/**
 * App\Models\BiDeliveryDevice
 *
 * @property int $id
 * @property int $delivery_order_id
 * @property string|null $imei
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryDevice whereDeliveryOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryDevice whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryDevice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiDeliveryDevice extends \App\Models\Base\BiDeliveryDevice
{
	protected $fillable = [
		'delivery_order_id',
		'imei'
	];
}
