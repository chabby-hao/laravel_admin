<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TZoneDeviceInterface
 * 
 * @property int $id
 * @property int $type
 * @property string $udid
 * @property int $add_time
 * @property int $zid
 *
 * @package App\Models\Base
 */
class TZoneDeviceInterface extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_zone_device_interface';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'add_time' => 'int',
		'zid' => 'int'
	];
}
