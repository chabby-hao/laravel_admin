<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 17 Apr 2018 19:27:01 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiUser
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $user_type
 * @property int $type_id
 * @property string $last_ip
 * @property \Carbon\Carbon $login_at
 * @property string $email
 * @property string $remember_token
 * @property string $nickname
 * @property \Illuminate\Database\Eloquent\Collection $role_users
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereUsername($value)
 * @mixin \Eloquent
 */
class BiUser extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'user_type' => 'int',
		'type_id' => 'int'
	];

	protected $dates = [
		'login_at'
	];

	public function role_users()
	{
		return $this->hasMany(\App\Models\RoleUser::class, 'user_id');
	}
}
