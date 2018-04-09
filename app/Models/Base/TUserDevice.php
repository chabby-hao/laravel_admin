<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Apr 2018 14:46:55 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TUserDevice
 *
 * @property int $id
 * @property int $uid
 * @property string $udid
 * @property int $state
 * @property int $owner
 * @property int $type
 * @property int $ptype
 * @property int $isshow
 * @property int $time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice whereIsshow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice wherePtype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserDevice whereUid($value)
 * @mixin \Eloquent
 */
class TUserDevice extends Eloquent
{
	protected $connection = 'care_user';
	protected $table = 't_user_device';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'state' => 'int',
		'owner' => 'int',
		'type' => 'int',
		'ptype' => 'int',
		'isshow' => 'int',
		'time' => 'int'
	];
}
