<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEbUserOption
 *
 * @property int $uid
 * @property string $realname
 * @property int $remind
 * @property int $notice
 * @property int $abmove
 * @property int $guard
 * @property int $safezone
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereAbmove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereGuard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereRealname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereRemind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereSafezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereUid($value)
 * @mixin \Eloquent
 * @property string|null $idcard 身份证号
 * @property bool|null $sex 性别，1=男，2=女
 * @property string|null $lpn 车牌号
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereIdcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereLpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEbUserOption whereSex($value)
 */
class TEbUserOption extends Eloquent
{
	protected $connection = 'care';
	protected $primaryKey = 'uid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'remind' => 'int',
		'notice' => 'int',
		'abmove' => 'int',
		'guard' => 'int',
		'safezone' => 'int'
	];
}
