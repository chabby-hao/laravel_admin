<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Aug 2018 10:56:20 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $permissions
 * @property \Illuminate\Database\Eloquent\Collection $role_users
 *
 * @package App\Models\Base
 */
class Role extends Eloquent
{
	protected $connection = 'bi';

	public function permissions()
	{
		return $this->belongsToMany(\App\Models\Permission::class);
	}

	public function role_users()
	{
		return $this->hasMany(\App\Models\RoleUser::class);
	}
}
