<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvState0
 *
 * @property string $udid
 * @property int $create_time
 * @property int $ev_key
 * @property int $ev_lock
 * @property float $voltage
 * @property int $percent
 * @property int $mileage
 * @property int $speed
 * @property int $gear
 * @property int $local_voltage
 * @property int $battery
 * @property int $usb
 * @property int $instrument_status_code
 * @property int $eBrake
 * @property int $limit_speed
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereBattery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereEBrake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereEvKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereEvLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereGear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereInstrumentStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereLimitSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereLocalVoltage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereUsb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvState0 whereVoltage($value)
 * @mixin \Eloquent
 */
class TEvState0 extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_state_0';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'create_time' => 'int',
		'ev_key' => 'int',
		'ev_lock' => 'int',
		'voltage' => 'float',
		'percent' => 'int',
		'mileage' => 'int',
		'speed' => 'int',
		'gear' => 'int',
		'local_voltage' => 'int',
		'battery' => 'int',
		'usb' => 'int',
		'instrument_status_code' => 'int',
		'eBrake' => 'int',
		'limit_speed' => 'int'
	];
}
