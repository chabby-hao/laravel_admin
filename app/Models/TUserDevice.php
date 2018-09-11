<?php

namespace App\Models;

/**
 * App\Models\TUserDevice
 *
 * @property int $id
 * @property int $uid
 * @property string|null $udid
 * @property int $state
 * @property int $owner 0=管理员，1=关注着，3=旁观者
 * @property int $type
 * @property int $ptype 设备产品类型
 * @property int $isshow 1为在地图上显示，0为不显示
 * @property int $time ....
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice whereIsshow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice wherePtype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserDevice whereUid($value)
 * @mixin \Eloquent
 */
class TUserDevice extends \App\Models\Base\TUserDevice
{

    const USER_TYPE_OWNER = 0;
    const USER_TYPE_WATCHER = 1;
    const USER_TYPE_LOOKER = 3;

    protected $fillable = [
		'uid',
		'udid',
		'state',
		'owner',
		'type',
		'ptype',
		'isshow',
		'time'
	];

    public static function getUserTypeMap($type = null)
    {
        $map = [
            self::USER_TYPE_OWNER => '管理员',
            self::USER_TYPE_WATCHER => '关注者',
            self::USER_TYPE_LOOKER => '旁观者',
        ];
        return $type === null ? $map : $map[$type];
    }


}
