<?php

namespace App\Models;

/**
 * App\Models\TUser
 *
 * @property int $uid
 * @property string|null $password
 * @property string|null $phone
 * @property string|null $name
 * @property string|null $photo
 * @property int $state 0 删除 1 正常 2 禁用
 * @property int $regist_time
 * @property int $last_login_time
 * @property int $type 1.安卓，2-ios，3-web
 * @property int $source 2-超牛
 * @property string|null $uuid
 * @property int $regist_type 1-手机号注册，2-qq注册，3-微信
 * @property string|null $ip
 * @property int $vip 0-普通用户   1-有预保险订单的VIP用户    2-无预保险，有已投保订单的VIP用户
 * @property int $vip_expire vip截止时间
 * @property int $login_duration 持续登录时间，天
 * @property int $open_number 同一天打开次数
 * @property int $is_activity_insurance 是否保险活动
 * @property int $insurance_expire 保险活动过期时间
 * @property int $reset_password_count 重置密码次数
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereInsuranceExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereIsActivityInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereLastLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereLoginDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereOpenNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereRegistTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereRegistType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereResetPasswordCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereVip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUser whereVipExpire($value)
 * @mixin \Eloquent
 */
class TUser extends \App\Models\Base\TUser
{
	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password',
		'phone',
		'name',
		'photo',
		'state',
		'regist_time',
		'last_login_time',
		'type',
		'source',
		'uuid',
		'regist_type',
		'ip',
		'vip',
		'vip_expire',
		'login_duration',
		'open_number',
		'is_activity_insurance',
		'insurance_expire',
		'reset_password_count'
	];
}
