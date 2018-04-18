<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 18:46:20 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDevice
 * 
 * @property int $id
 * @property string $udid
 * @property string $name
 * @property string $photo
 * @property int $rate
 * @property \Carbon\Carbon $regist_time
 * @property int $type
 * @property string $imei
 * @property int $mode
 * @property string $push
 * @property int $remind
 * @property int $notice
 * @property int $abmove
 * @property string $chassis
 * @property int $user_voltage
 * @property int $user_brand
 * @property string $user_model
 * @property int $is_lose
 *
 * @package App\Models\Base
 */
class TDevice extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device';
	public $timestamps = false;

	protected $casts = [
		'rate' => 'int',
		'type' => 'int',
		'mode' => 'int',
		'remind' => 'int',
		'notice' => 'int',
		'abmove' => 'int',
		'user_voltage' => 'int',
		'user_brand' => 'int',
		'is_lose' => 'int'
	];

	protected $dates = [
		'regist_time'
	];
}
