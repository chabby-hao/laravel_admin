<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceLatest
 * 
 * @property int $id
 * @property string $udid
 * @property int $stime
 * @property float $lat
 * @property float $lng
 * @property float $gsm_lat
 * @property float $gsm_lng
 * @property float $speed
 * @property float $course
 * @property int $gsm_signal
 * @property int $gps_signal
 * @property bool $online
 *
 * @package App\Models\Base
 */
class TDeviceLatest extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_latest';
	public $timestamps = false;

	protected $casts = [
		'stime' => 'int',
		'lat' => 'float',
		'lng' => 'float',
		'gsm_lat' => 'float',
		'gsm_lng' => 'float',
		'speed' => 'float',
		'course' => 'float',
		'gsm_signal' => 'int',
		'gps_signal' => 'int',
		'online' => 'bool'
	];
}
