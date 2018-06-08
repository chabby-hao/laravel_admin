<?php

namespace App\Models;

/**
 * App\Models\TFriendInvite
 *
 * @property int $sid
 * @property int $inviter
 * @property string|null $phone
 * @property int $status
 * @property \Carbon\Carbon|null $create_tm
 * @property \Carbon\Carbon|null $finish_tm
 * @property string|null $name
 * @property string|null $mobile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFriendInvite whereCreateTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFriendInvite whereFinishTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFriendInvite whereInviter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFriendInvite whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFriendInvite whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFriendInvite wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFriendInvite whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFriendInvite whereStatus($value)
 * @mixin \Eloquent
 */
class TFriendInvite extends \App\Models\Base\TFriendInvite
{
	protected $fillable = [
		'inviter',
		'phone',
		'status',
		'create_tm',
		'finish_tm',
		'name',
		'mobile'
	];
}
