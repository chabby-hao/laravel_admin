<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 09:49:12 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceCode
 * 
 * @property int $sid
 * @property int $type
 * @property string $imei
 * @property string $imsi
 * @property string $phone
 * @property string $qr
 * @property \Carbon\Carbon $register
 * @property int $active
 * @property int $first
 * @property int $ver
 * @property int $rom
 * @property int $model
 * @property \Carbon\Carbon $product_date
 * @property int $product_type
 * @property \Carbon\Carbon $storage_time
 * @property int $ebike_type_id
 * @property int $channel_id
 * @property int $brand_id
 * @property int $device_type
 * @property \Carbon\Carbon $delivered_at
 * @property int $is_lost
 * @property int $device_cycle
 *
 * @package App\Models\Base
 */
class TDeviceCode extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_code';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'active' => 'int',
		'first' => 'int',
		'ver' => 'int',
		'rom' => 'int',
		'model' => 'int',
		'product_type' => 'int',
		'ebike_type_id' => 'int',
		'channel_id' => 'int',
		'brand_id' => 'int',
		'device_type' => 'int',
		'is_lost' => 'int',
		'device_cycle' => 'int'
	];

	protected $dates = [
		'register',
		'product_date',
		'storage_time',
		'delivered_at'
	];
}
