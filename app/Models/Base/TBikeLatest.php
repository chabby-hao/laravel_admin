<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TBikeLatest
 *
 * @property int $id
 * @property string $udid
 * @property int $stime
 * @property int $bt_lock
 * @property int $subbt_percent
 * @property int $move
 * @property int $ev_key
 * @property int $ev_lock
 * @property int $voltage
 * @property int $percent
 * @property int $mileage
 * @property int $speed
 * @property int $gear
 * @property int $fault
 * @property bool $online
 * @property int $ev_lock_status
 * @property int $ev_start_config
 * @property int $ev_start_status
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereBtLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereEvKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereEvLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereEvLockStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereEvStartConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereEvStartStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereFault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereGear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereMove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereStime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereSubbtPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeLatest whereVoltage($value)
 * @mixin \Eloquent
 */
class TBikeLatest extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_bike_latest';
	public $timestamps = false;

	protected $casts = [
		'stime' => 'int',
		'bt_lock' => 'int',
		'subbt_percent' => 'int',
		'move' => 'int',
		'ev_key' => 'int',
		'ev_lock' => 'int',
		'voltage' => 'int',
		'percent' => 'int',
		'mileage' => 'int',
		'speed' => 'int',
		'gear' => 'int',
		'fault' => 'int',
		'online' => 'bool',
		'ev_lock_status' => 'int',
		'ev_start_config' => 'int',
		'ev_start_status' => 'int'
	];
}
