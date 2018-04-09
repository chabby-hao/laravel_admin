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
}
