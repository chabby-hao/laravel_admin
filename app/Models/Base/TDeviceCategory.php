<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 17:42:31 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceCategory
 *
 * @property string $udid
 * @property int $channel
 * @property int $brand
 * @property int $category
 * @property int $model
 * @property string $imei
 * @property int $last
 * @property int $ver
 * @property \Carbon\Carbon $delivered_ts
 * @property \Carbon\Carbon $production_ts
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereDeliveredTs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereLast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereProductionTs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereVer($value)
 * @mixin \Eloquent
 */
class TDeviceCategory extends Eloquent
{
	protected $connection = 'care_log';
	protected $table = 't_device_category';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'channel' => 'int',
		'brand' => 'int',
		'category' => 'int',
		'model' => 'int',
		'last' => 'int',
		'ver' => 'int'
	];

	protected $dates = [
		'delivered_ts',
		'production_ts'
	];
}
