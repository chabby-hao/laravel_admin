<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TBikeFault
 *
 * @property int $id
 * @property string $udid
 * @property int $stime
 * @property int $ocp
 * @property int $hot
 * @property int $high
 * @property int $low
 * @property int $battery_low
 * @property int $block
 * @property int $hand_nopower
 * @property int $hand_earth
 * @property int $hand_back
 * @property int $brake_back
 * @property int $up_bridge
 * @property int $down_bridge
 * @property int $hallA_off
 * @property int $hallA_short
 * @property int $hallB_off
 * @property int $hallB_short
 * @property int $hallC_off
 * @property int $hallC_short
 * @property int $hall_value_fail
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereBatteryLow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereBrakeBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereDownBridge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHallAOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHallAShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHallBOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHallBShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHallCOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHallCShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHallValueFail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHandBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHandEarth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHandNopower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHigh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereHot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereLow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereOcp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereStime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TBikeFault whereUpBridge($value)
 * @mixin \Eloquent
 */
class TBikeFault extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_bike_fault';
	public $timestamps = false;

	protected $casts = [
		'stime' => 'int',
		'ocp' => 'int',
		'hot' => 'int',
		'high' => 'int',
		'low' => 'int',
		'battery_low' => 'int',
		'block' => 'int',
		'hand_nopower' => 'int',
		'hand_earth' => 'int',
		'hand_back' => 'int',
		'brake_back' => 'int',
		'up_bridge' => 'int',
		'down_bridge' => 'int',
		'hallA_off' => 'int',
		'hallA_short' => 'int',
		'hallB_off' => 'int',
		'hallB_short' => 'int',
		'hallC_off' => 'int',
		'hallC_short' => 'int',
		'hall_value_fail' => 'int'
	];
}
