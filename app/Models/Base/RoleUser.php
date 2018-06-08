<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 May 2018 17:25:41 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RoleUser
 *
 * @property int $user_id
 * @property int $role_id
 * @property \App\Models\Role $role
 * @property \App\Models\BiUser $bi_user
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\RoleUser whereUserId($value)
 * @mixin \Eloquent
 */
class RoleUser extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'role_user';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'role_id' => 'int'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class);
	}

	public function bi_user()
	{
		return $this->belongsTo(\App\Models\BiUser::class, 'user_id');
	}
}
