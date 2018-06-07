<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceTmp
 * 
 * @property string $udid
 * @property int $type
 * @property int $ptype
 * @property int $active
 * @property int $pay
 * @property int $expire
 * @property string $imei
 * @property string $imsi
 * @property int $device_type
 *
 * @package App\Models\Base
 */
class TDeviceTmp extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_tmp';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'ptype' => 'int',
		'active' => 'int',
		'pay' => 'int',
		'expire' => 'int',
		'device_type' => 'int'
	];
}
