<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvFault
 * 
 * @property string $udid
 * @property string $create_time
 * @property int $power
 * @property int $control
 * @property int $cruise
 * @property int $hall
 * @property int $block
 * @property int $low
 * @property int $switch
 * @property int $phase
 * @property int $ocp
 *
 * @package App\Models\Base
 */
class TEvFault extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_fault';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'power' => 'int',
		'control' => 'int',
		'cruise' => 'int',
		'hall' => 'int',
		'block' => 'int',
		'low' => 'int',
		'switch' => 'int',
		'phase' => 'int',
		'ocp' => 'int'
	];
}
