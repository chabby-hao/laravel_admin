<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvChargeLog
 *
 * @property int $id
 * @property string $udid
 * @property string $imei
 * @property int $pre_v
 * @property int $next_v
 * @property int $umax
 * @property int $vmax
 * @property int $create_time
 * @property int $charge_time
 * @property int $pre_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog whereChargeTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog whereNextV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog wherePreTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog wherePreV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog whereUmax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvChargeLog whereVmax($value)
 * @mixin \Eloquent
 */
class TEvChargeLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_charge_log';
	public $timestamps = false;

	protected $casts = [
		'pre_v' => 'int',
		'next_v' => 'int',
		'umax' => 'int',
		'vmax' => 'int',
		'create_time' => 'int',
		'charge_time' => 'int',
		'pre_time' => 'int'
	];
}
