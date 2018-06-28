<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TLoginLog
 *
 * @property int $id
 * @property int $uid
 * @property int $login_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLoginLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLoginLog whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLoginLog whereUid($value)
 * @mixin \Eloquent
 */
class TLoginLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_login_log';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'login_time' => 'int'
	];
}
