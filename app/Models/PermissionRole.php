<?php

namespace App\Models;

/**
 * App\Models\PermissionRole
 *
 * @property int $permission_id
 * @property int $role_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionRole wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionRole whereRoleId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Permission $permission
 * @property-read \App\Models\Role $role
 */
class PermissionRole extends \App\Models\Base\PermissionRole
{

}
