<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TSafeZone
 * 
 * @property int $zid
 * @property string $name
 * @property string $address
 * @property string $desc
 * @property string $lat
 * @property string $lng
 * @property int $radius
 * @property int $state
 * @property \Carbon\Carbon $create_time
 * @property int $uid
 * @property string $user
 *
 * @package App\Models\Base
 */
class TSafeZone extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_safe_zone';
	protected $primaryKey = 'zid';
	public $timestamps = false;

	protected $casts = [
		'radius' => 'int',
		'state' => 'int',
		'uid' => 'int'
	];

	protected $dates = [
		'create_time'
	];
}
