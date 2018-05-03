<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 May 2018 15:35:38 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TStatDevice
 * 
 * @property int $date
 * @property int $products
 * @property string $model
 * @property int $channel
 * @property int $type
 * @property int $brand
 * @property int $level
 * @property bool $is_day_stat_complete
 * @property int $total_production_device
 * @property int $total_delivered_device
 * @property int $total_actived_device
 * @property int $production_device_today
 * @property int $delivered_device_today
 * @property int $actived_device_today
 * @property int $activing_device
 * @property int $user_login_today_have_mile
 * @property int $activing_noactived_device
 * @property int $activing_device_7days
 * @property int $activing_device_3days
 * @property int $duration_online_today
 * @property int $request_count_today
 * @property int $online_count_today
 * @property int $online_today_all
 *
 * @package App\Models\Base
 */
class TStatDevice extends Eloquent
{
	protected $connection = 'care_operate';
	protected $table = 't_stat_device';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'date' => 'int',
		'products' => 'int',
		'channel' => 'int',
		'type' => 'int',
		'brand' => 'int',
		'level' => 'int',
		'is_day_stat_complete' => 'bool',
		'total_production_device' => 'int',
		'total_delivered_device' => 'int',
		'total_actived_device' => 'int',
		'production_device_today' => 'int',
		'delivered_device_today' => 'int',
		'actived_device_today' => 'int',
		'activing_device' => 'int',
		'user_login_today_have_mile' => 'int',
		'activing_noactived_device' => 'int',
		'activing_device_7days' => 'int',
		'activing_device_3days' => 'int',
		'duration_online_today' => 'int',
		'request_count_today' => 'int',
		'online_count_today' => 'int',
		'online_today_all' => 'int'
	];
}
