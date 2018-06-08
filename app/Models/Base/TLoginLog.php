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
 *
 * @package App\Models\Base
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
