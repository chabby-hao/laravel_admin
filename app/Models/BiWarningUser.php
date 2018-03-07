<?php

namespace App\Models;

/**
 * App\Models\BiWarningUser
 *
 * @property int $id
 * @property string|null $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $email_address
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiWarningUser extends \App\Models\Base\BiWarningUser
{
	protected $fillable = [
		'name',
		'email_address'
	];
}
