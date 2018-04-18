<?php

namespace App\Models;

/**
 * App\Models\TLockLog
 *
 * @property int $id
 * @property string $udid
 * @property string $act lock=锁，unlock=解锁，sq_lock=闪骑锁，sq_unlock=闪骑解锁，p_lock=电池锁,p_unlock=电池解锁,d_lock=锁车关电门,d_unlock=解锁开电门,xy_lock=西游锁车,xy_unlock=西游解锁
 * @property \Carbon\Carbon $add_time
 * @property int $uid uid=0时，为非超牛APP锁车操作
 * @property string|null $username
 * @property string|null $phone
 * @property int $login_log_id 当前登录日志id
 * @property int $type 0=远程，1=蓝牙
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog whereAct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog whereLoginLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLockLog whereUsername($value)
 * @mixin \Eloquent
 */
class TLockLog extends \App\Models\Base\TLockLog
{

    const LOCK_TYPE_REMOTE = 0;//远程
    const LOCK_TYPE_BT = 1;//蓝牙

    public static function getLockTypeMap($type = null)
    {
        $map = [
            self::LOCK_TYPE_REMOTE => '远程',
            self::LOCK_TYPE_BT => '蓝牙',
        ];
        return $type === null ? $map : $map[$type];
    }

	protected $fillable = [
		'udid',
		'act',
		'add_time',
		'uid',
		'username',
		'phone',
		'login_log_id',
		'type'
	];
}
