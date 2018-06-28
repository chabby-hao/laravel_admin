<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog whereAct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog whereLoginLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLockLog whereUsername($value)
 * @mixin \Eloquent
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
