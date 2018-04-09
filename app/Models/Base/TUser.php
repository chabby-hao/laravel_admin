<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Apr 2018 14:46:55 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TUser
 *
 * @property int $uid
 * @property string $password
 * @property string $phone
 * @property string $name
 * @property string $photo
 * @property int $state
 * @property int $regist_time
 * @property int $last_login_time
 * @property int $type
 * @property int $source
 * @property string $uuid
 * @property int $regist_type
 * @property string $ip
 * @property int $vip
 * @property int $vip_expire
 * @property int $login_duration
 * @property int $open_number
 * @property int $is_activity_insurance
 * @property int $insurance_expire
 * @property int $reset_password_count
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereInsuranceExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereIsActivityInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereLastLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereLoginDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereOpenNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereRegistTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereRegistType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereResetPasswordCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereVip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUser whereVipExpire($value)
 * @mixin \Eloquent
 */
class TUser extends Eloquent
{
	protected $connection = 'care_user';
	protected $table = 't_user';
	protected $primaryKey = 'uid';
	public $timestamps = false;

	protected $casts = [
		'state' => 'int',
		'regist_time' => 'int',
		'last_login_time' => 'int',
		'type' => 'int',
		'source' => 'int',
		'regist_type' => 'int',
		'vip' => 'int',
		'vip_expire' => 'int',
		'login_duration' => 'int',
		'open_number' => 'int',
		'is_activity_insurance' => 'int',
		'insurance_expire' => 'int',
		'reset_password_count' => 'int'
	];
}
