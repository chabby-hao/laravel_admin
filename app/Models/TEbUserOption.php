<?php

namespace App\Models;

/**
 * App\Models\TEbUserOption
 *
 * @property int $uid
 * @property string|null $realname
 * @property int $remind 忘记锁车，0=不推，1=推
 * @property int $notice 里程结束，0=不推，1=推
 * @property int $abmove 异常震动，0=不推，1=推
 * @property int $guard 电瓶断开，0=不推，1=推
 * @property int $safezone 安全区域，0=不推，1=推
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbUserOption whereAbmove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbUserOption whereGuard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbUserOption whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbUserOption whereRealname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbUserOption whereRemind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbUserOption whereSafezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbUserOption whereUid($value)
 * @mixin \Eloquent
 */
class TEbUserOption extends \App\Models\Base\TEbUserOption
{
	protected $fillable = [
		'realname',
		'remind',
		'notice',
		'abmove',
		'guard',
		'safezone'
	];
}
