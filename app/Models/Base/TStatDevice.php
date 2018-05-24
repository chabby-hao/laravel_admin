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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereActivedDeviceToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereActivingDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereActivingDevice3days($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereActivingDevice7days($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereActivingNoactivedDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereDeliveredDeviceToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereDurationOnlineToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereIsDayStatComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereOnlineCountToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereOnlineTodayAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereProductionDeviceToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereRequestCountToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereTotalActivedDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereTotalDeliveredDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereTotalProductionDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStatDevice whereUserLoginTodayHaveMile($value)
 * @mixin \Eloquent
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
