<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Apr 2018 14:46:55 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TUserInfo
 *
 * @property int $uid
 * @property int $source
 * @property int $type
 * @property string $uuid
 * @property int $push
 * @property string $push_id
 * @property int $rom
 * @property int $report
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserInfo wherePush($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserInfo wherePushId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserInfo whereReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserInfo whereRom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserInfo whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserInfo whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserInfo whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserInfo whereUuid($value)
 * @mixin \Eloquent
 */
class TUserInfo extends Eloquent
{
	protected $connection = 'care_user';
	protected $table = 't_user_info';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'source' => 'int',
		'type' => 'int',
		'push' => 'int',
		'rom' => 'int',
		'report' => 'int'
	];
}
