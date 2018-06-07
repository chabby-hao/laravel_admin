<?php

namespace App\Models;

/**
 * App\Models\TSalesDevice
 *
 * @property string $imei
 * @property string|null $udid
 * @property \Carbon\Carbon|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSalesDevice whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSalesDevice whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSalesDevice whereUdid($value)
 * @mixin \Eloquent
 */
class TSalesDevice extends \App\Models\Base\TSalesDevice
{
	protected $fillable = [
		'udid',
		'active'
	];
}
