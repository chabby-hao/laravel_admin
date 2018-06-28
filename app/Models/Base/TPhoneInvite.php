<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TPhoneInvite
 *
 * @property string $code
 * @property string $mobile
 * @property string $udid
 * @property int $state
 * @property \Carbon\Carbon $create_tm
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPhoneInvite whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPhoneInvite whereCreateTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPhoneInvite whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPhoneInvite whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPhoneInvite whereUdid($value)
 * @mixin \Eloquent
 */
class TPhoneInvite extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_phone_invite';
	protected $primaryKey = 'code';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'int'
	];

	protected $dates = [
		'create_tm'
	];
}
