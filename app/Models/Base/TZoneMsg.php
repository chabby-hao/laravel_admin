<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 18:46:20 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TZoneMsg
 * 
 * @property int $mid
 * @property string $udid
 * @property int $zid
 * @property int $state
 * @property int $time
 *
 * @package App\Models\Base
 */
class TZoneMsg extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_zone_msg';
	protected $primaryKey = 'mid';
	public $timestamps = false;

	protected $casts = [
		'zid' => 'int',
		'state' => 'int',
		'time' => 'int'
	];
}
