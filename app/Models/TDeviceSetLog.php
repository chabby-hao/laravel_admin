<?php

namespace App\Models;

/**
 * App\Models\TDeviceSetLog
 *
 * @property int $id
 * @property string|null $udid
 * @property int $uid
 * @property \Carbon\Carbon|null $addtime
 * @property string|null $act 动作描述
 * @property int $login_log_id 当前登录日志id
 * @property string|null $type brand=品牌，voltage=电压，model=型号
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceSetLog whereAct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceSetLog whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceSetLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceSetLog whereLoginLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceSetLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceSetLog whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceSetLog whereUid($value)
 * @mixin \Eloquent
 */
class TDeviceSetLog extends \App\Models\Base\TDeviceSetLog
{
	protected $fillable = [
		'udid',
		'uid',
		'addtime',
		'act',
		'login_log_id',
		'type'
	];
}
