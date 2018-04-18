<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 17 Apr 2018 19:28:19 +0800.
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
 *
 * @package App\Models\Base
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
