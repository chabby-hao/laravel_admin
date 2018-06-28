<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvVoltage
 *
 * @property string $udid
 * @property int $mid
 * @property int $mid_time
 * @property \Carbon\Carbon $refresh_time
 * @property int $vol
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvVoltage whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvVoltage whereMidTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvVoltage whereRefreshTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvVoltage whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvVoltage whereVol($value)
 * @mixin \Eloquent
 */
class TEvVoltage extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_voltage';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'mid' => 'int',
		'mid_time' => 'int',
		'vol' => 'int'
	];

	protected $dates = [
		'refresh_time'
	];
}
