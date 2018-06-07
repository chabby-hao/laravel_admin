<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureOrder
 * 
 * @property string $order_id
 * @property \Carbon\Carbon $create_time
 * @property string $insure_id
 * @property \Carbon\Carbon $insure_time
 * @property string $udid
 * @property string $uid
 * @property int $insure_type
 * @property int $status
 * @property string $name
 * @property string $contact
 * @property string $address
 * @property string $idcard
 * @property string $insure_time_length
 * @property \Carbon\Carbon $insure_start
 * @property \Carbon\Carbon $insure_end
 * @property string $active_code
 * @property string $insure_name
 * @property string $ebike_brand
 * @property string $chassis_id
 * @property string $plate_number
 * @property string $electromotor_number
 * @property string $ebike_model
 * @property int $payment_limit
 * @property array $messages_json
 * @property int $mode
 * @property int $is_del
 *
 * @package App\Models\Base
 */
class TInsureOrder extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_insure_order';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'insure_type' => 'int',
		'status' => 'int',
		'payment_limit' => 'int',
		'messages_json' => 'json',
		'mode' => 'int',
		'is_del' => 'int'
	];

	protected $dates = [
		'create_time',
		'insure_time',
		'insure_start',
		'insure_end'
	];
}
