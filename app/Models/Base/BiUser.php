<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Aug 2018 10:56:20 +0800.
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
 * 
 * @property \Illuminate\Database\Eloquent\Collection $role_users
 *
 * @package App\Models\Base
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
