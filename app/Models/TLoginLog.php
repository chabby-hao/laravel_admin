<?php

namespace App\Models;

/**
 * App\Models\TLoginLog
 *
 * @property int $id
 * @property int $uid
 * @property int $login_time 登录时间戳
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLoginLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLoginLog whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLoginLog whereUid($value)
 * @mixin \Eloquent
 */
class TLoginLog extends \App\Models\Base\TLoginLog
{
	protected $fillable = [
		'uid',
		'login_time'
	];
}
