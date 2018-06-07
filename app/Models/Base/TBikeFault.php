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
 *
 * @package App\Models\Base
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
