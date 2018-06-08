<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceSetLog
 * 
 * @property int $id
 * @property string $udid
 * @property int $uid
 * @property \Carbon\Carbon $addtime
 * @property string $act
 * @property int $login_log_id
 * @property string $type
 *
 * @package App\Models\Base
 */
class TDeviceSetLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_set_log';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'login_log_id' => 'int'
	];

	protected $dates = [
		'addtime'
	];
}
