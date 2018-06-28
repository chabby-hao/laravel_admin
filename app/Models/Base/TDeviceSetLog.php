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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceSetLog whereAct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceSetLog whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceSetLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceSetLog whereLoginLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceSetLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceSetLog whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceSetLog whereUid($value)
 * @mixin \Eloquent
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
