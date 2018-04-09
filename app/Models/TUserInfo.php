<?php

namespace App\Models;

/**
 * App\Models\TUserInfo
 *
 * @property int $uid
 * @property int $source 用户来源
 * @property int $type 最后一次登录类型
 * @property string|null $uuid 设备串
 * @property int $push 是否接受推送消息
 * @property string|null $push_id 推送串
 * @property int $rom
 * @property int $report 是否报告位置
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserInfo wherePush($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserInfo wherePushId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserInfo whereReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserInfo whereRom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserInfo whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserInfo whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserInfo whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserInfo whereUuid($value)
 * @mixin \Eloquent
 */
class TUserInfo extends \App\Models\Base\TUserInfo
{
	protected $fillable = [
		'type',
		'uuid',
		'push',
		'push_id',
		'rom',
		'report'
	];
}
