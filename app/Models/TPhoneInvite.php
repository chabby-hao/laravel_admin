<?php

namespace App\Models;

/**
 * App\Models\TPhoneInvite
 *
 * @property string $code
 * @property string $mobile
 * @property string $udid
 * @property int $state
 * @property \Carbon\Carbon|null $create_tm
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPhoneInvite whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPhoneInvite whereCreateTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPhoneInvite whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPhoneInvite whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPhoneInvite whereUdid($value)
 * @mixin \Eloquent
 */
class TPhoneInvite extends \App\Models\Base\TPhoneInvite
{
	protected $fillable = [
		'mobile',
		'udid',
		'state',
		'create_tm'
	];
}
