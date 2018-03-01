<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Feb 2018 03:36:57 +0000.
 */

namespace App\Models;

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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereAbmove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereChassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereIsLose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice wherePush($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereRegistTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereRemind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereUserBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereUserModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereUserVoltage($value)
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

	protected $fillable = [
		'udid',
		'name',
		'photo',
		'rate',
		'regist_time',
		'type',
		'imei',
		'mode',
		'push',
		'remind',
		'notice',
		'abmove',
		'chassis',
		'user_voltage',
		'user_brand',
		'user_model',
		'is_lose'
	];
}
