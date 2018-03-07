<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Mar 2018 18:09:31 +0800.
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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategory whereUdid($value)
 * @mixin \Eloquent
 */
class TDeviceCategory extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_category';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'channel' => 'int',
		'brand' => 'int',
		'category' => 'int',
		'model' => 'int'
	];
}
