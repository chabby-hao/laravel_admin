<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Aug 2018 14:28:34 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Permission
 * 
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models\Base
 */
class Permission extends Eloquent
{
	protected $connection = 'bi';

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
}
