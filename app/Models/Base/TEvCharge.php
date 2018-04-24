<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Apr 2018 16:16:54 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvCharge
 *
 * @property string $udid
 * @property int $mid
 * @property int $mid_time
 * @property \Carbon\Carbon $refresh_time
 * @property int $cycle
 * @property int $vol
 * @property int $prevol
 * @property int $loop
 * @property int $loop_mid
 * @property int $loop_last_mile
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereLoop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereLoopLastMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereLoopMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereMidTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge wherePrevol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereRefreshTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvCharge whereVol($value)
 * @mixin \Eloquent
 */
class TEvCharge extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_charge';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'mid' => 'int',
		'mid_time' => 'int',
		'cycle' => 'int',
		'vol' => 'int',
		'prevol' => 'int',
		'loop' => 'int',
		'loop_mid' => 'int',
		'loop_last_mile' => 'int'
	];

	protected $dates = [
		'refresh_time'
	];
}
