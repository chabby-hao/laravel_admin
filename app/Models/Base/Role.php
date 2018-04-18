<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 17 Apr 2018 19:27:01 +0800.
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
 * @property \Illuminate\Database\Eloquent\Collection $permissions
 * @property \Illuminate\Database\Eloquent\Collection $role_users
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Role whereUpdatedAt($value)
 * @mixin \Eloquent
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
