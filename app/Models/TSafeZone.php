<?php

namespace App\Models;

/**
 * App\Models\TSafeZone
 *
 * @property int $zid
 * @property string $name
 * @property string $address
 * @property string $desc
 * @property string $lat
 * @property string $lng
 * @property int $radius
 * @property int $state 0 暂停启用 1启用
 * @property \Carbon\Carbon $create_time
 * @property int $uid
 * @property string|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereRadius($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSafeZone whereZid($value)
 * @mixin \Eloquent
 */
class TSafeZone extends \App\Models\Base\TSafeZone
{
	protected $fillable = [
		'name',
		'address',
		'desc',
		'lat',
		'lng',
		'radius',
		'state',
		'create_time',
		'uid',
		'user'
	];
}
