<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TFriendInvite
 * 
 * @property int $sid
 * @property int $inviter
 * @property string $phone
 * @property int $status
 * @property \Carbon\Carbon $create_tm
 * @property \Carbon\Carbon $finish_tm
 * @property string $name
 * @property string $mobile
 *
 * @package App\Models\Base
 */
class TFriendInvite extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_friend_invite';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'inviter' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'create_tm',
		'finish_tm'
	];
}
