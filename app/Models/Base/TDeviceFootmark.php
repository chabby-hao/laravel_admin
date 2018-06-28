<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceFootmark
 *
 * @property string $udid
 * @property int $year
 * @property int $month
 * @property int $days
 * @property int $gps
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceFootmark whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceFootmark whereGps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceFootmark whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceFootmark whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceFootmark whereYear($value)
 * @mixin \Eloquent
 */
class TDeviceFootmark extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_footmark';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'year' => 'int',
		'month' => 'int',
		'days' => 'int',
		'gps' => 'int'
	];
}
