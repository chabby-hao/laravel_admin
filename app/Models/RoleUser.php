<?php

namespace App\Models;

/**
 * App\Models\RoleUser
 *
 * @property int $user_id
 * @property int $role_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleUser whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\BiUser $bi_user
 * @property-read \App\Models\Role $role
 */
class RoleUser extends \App\Models\Base\RoleUser
{

}
