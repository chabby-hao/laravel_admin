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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereRadius($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSafeZone whereZid($value)
 * @mixin \Eloquent
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
