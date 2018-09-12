<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
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
 * @property int $state
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryDevice whereDeliveryOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryDevice whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryDevice whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeliveryDevice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiDeliveryDevice extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'delivery_order_id' => 'int',
		'state' => 'int'
	];
}
