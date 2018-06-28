<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDevice
 *
 * @property int $id
 * @property string $udid
 * @property string $name
 * @property string $photo
 * @property int $rate
 * @property \Carbon\Carbon $regist_time
 * @property int $type
 * @property string $imei
 * @property int $mode
 * @property string $push
 * @property int $remind
 * @property int $notice
 * @property int $abmove
 * @property string $chassis
 * @property int $user_voltage
 * @property int $user_brand
 * @property string $user_model
 * @property int $is_lose
 * @property string $province
 * @property string $city
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereAbmove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereChassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereIsLose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice wherePush($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereRegistTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereRemind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereUserBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereUserModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDevice whereUserVoltage($value)
 * @mixin \Eloquent
 */
class TDevice extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device';
	public $timestamps = false;

	protected $casts = [
		'rate' => 'int',
		'type' => 'int',
		'mode' => 'int',
		'remind' => 'int',
		'notice' => 'int',
		'abmove' => 'int',
		'user_voltage' => 'int',
		'user_brand' => 'int',
		'is_lose' => 'int'
	];

	protected $dates = [
		'regist_time'
	];
}
