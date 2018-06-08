<?php

namespace App\Models;

/**
 * App\Models\TBikeLatest
 *
 * @property int $id 记录的id号
 * @property string $udid 设备唯一标识
 * @property int $stime 状态发 时间戳
 * @property int $bt_lock 电池锁状态(0:未锁;1:已锁)
 * @property int $subbt_percent 副电池电量百分
 * @property int $move 电机转动(0:静 ;1:有转动)
 * @property int $ev_key 电 状态(0:关闭;1:打开)，电 为 0 时，以下数据 都 效
 * @property int $ev_lock 锁车配置(0:未锁;1:已锁)
 * @property int $voltage 主电池电压(*10mV)
 * @property int $percent 当前电量百分
 * @property int $mileage 实时总里程(米)
 * @property int $speed 当前速度 (米/小时
 * @property int $gear 档位(1-4 档)
 * @property int $fault 故障信息,1个字节8个故障
 * @property bool $online 是否在线,(0:不在线,数据都无效,1:在线)
 * @property int $ev_lock_status 锁车状态(通过控制器返回的)
 * @property int $ev_start_config 零/非零启动配置(0:零启动;1:非零启动)
 * @property int $ev_start_status 零/非零启动状态(通过控制器返回的)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereBtLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereEvKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereEvLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereEvLockStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereEvStartConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereEvStartStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereFault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereGear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereMove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereStime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereSubbtPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeLatest whereVoltage($value)
 * @mixin \Eloquent
 */
class TBikeLatest extends \App\Models\Base\TBikeLatest
{
	protected $fillable = [
		'udid',
		'stime',
		'bt_lock',
		'subbt_percent',
		'move',
		'ev_key',
		'ev_lock',
		'voltage',
		'percent',
		'mileage',
		'speed',
		'gear',
		'fault',
		'online',
		'ev_lock_status',
		'ev_start_config',
		'ev_start_status'
	];
}
