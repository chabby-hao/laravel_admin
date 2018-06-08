<?php

namespace App\Models;

/**
 * App\Models\TDeviceCategory
 *
 * @property string $udid
 * @property int $channel
 * @property int $brand
 * @property int $category
 * @property int $model
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereUdid($value)
 * @mixin \Eloquent
 * @property string|null $imei
 * @property int $last
 * @property int $ver
 * @property \Carbon\Carbon|null $delivered_ts
 * @property \Carbon\Carbon|null $production_ts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereDeliveredTs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereLast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereProductionTs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategory whereVer($value)
 */
class TDeviceCategory extends \App\Models\Base\TDeviceCategory
{
	protected $fillable = [
		'channel',
		'brand',
		'category',
		'model',
        'udid',
	];
}
