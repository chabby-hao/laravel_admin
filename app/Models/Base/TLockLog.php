<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Apr 2018 16:16:54 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TLockLog
 * 
 * @property int $id
 * @property string $udid
 * @property string $act
 * @property \Carbon\Carbon $add_time
 * @property int $uid
 * @property string $username
 * @property string $phone
 * @property int $login_log_id
 * @property int $type
 *
 * @package App\Models\Base
 */
class TLockLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_lock_log';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'login_log_id' => 'int',
		'type' => 'int'
	];

	protected $dates = [
		'add_time'
	];
}
