<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 May 2018 17:25:41 +0800.
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
 * @property \Illuminate\Database\Eloquent\Collection $roles
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends Eloquent
{
	protected $connection = 'bi';

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
}
