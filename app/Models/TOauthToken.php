<?php

namespace App\Models;

/**
 * App\Models\TOauthToken
 *
 * @property int $platform
 * @property string|null $token
 * @property int $expire
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TOauthToken whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TOauthToken wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TOauthToken whereToken($value)
 * @mixin \Eloquent
 */
class TOauthToken extends \App\Models\Base\TOauthToken
{
	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'token',
		'expire'
	];
}
