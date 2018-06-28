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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneDeviceInterface whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneDeviceInterface whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneDeviceInterface whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneDeviceInterface whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneDeviceInterface whereZid($value)
 * @mixin \Eloquent
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
