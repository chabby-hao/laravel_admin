<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 17:17:25 +0800.
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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereActiveCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereChassisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereEbikeBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereEbikeModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereElectromotorNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereIdcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereInsureEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereInsureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereInsureName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereInsureStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereInsureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereInsureTimeLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereInsureType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereMessagesJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder wherePaymentLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder wherePlateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrder whereUid($value)
 * @mixin \Eloquent
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
