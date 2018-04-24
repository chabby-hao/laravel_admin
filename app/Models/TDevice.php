<?php

namespace App\Models;

/**
 * App\Models\TDevice
 *
 * @property int $id
 * @property string $udid
 * @property string|null $name 设备名称
 * @property string|null $photo
 * @property int $rate
 * @property \Carbon\Carbon $regist_time
 * @property int $type
 * @property string|null $imei
 * @property int $mode
 * @property string|null $push
 * @property int $remind
 * @property int $notice
 * @property int $abmove
 * @property string|null $chassis 车架号
 * @property int $user_voltage 用户上传电压
 * @property int $user_brand 用户上传品牌
 * @property string|null $user_model 用户上传车辆型号
 * @property int $is_lose 是否丢失，0-没有丢失，1-丢失
 * @property string|null $province 省
 * @property string|null $city 市
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereAbmove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereChassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereIsLose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDevice whereProvince($value)
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
class TDevice extends \App\Models\Base\TDevice
{
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
		'is_lose',
		'province',
		'city'
	];
}
