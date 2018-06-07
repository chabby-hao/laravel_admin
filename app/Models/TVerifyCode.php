<?php

namespace App\Models;

/**
 * App\Models\TVerifyCode
 *
 * @property int $sid
 * @property string $mobile
 * @property string $code
 * @property \Carbon\Carbon $create_tm
 * @property int $type
 * @property int $state
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVerifyCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVerifyCode whereCreateTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVerifyCode whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVerifyCode whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVerifyCode whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVerifyCode whereType($value)
 * @mixin \Eloquent
 */
class TVerifyCode extends \App\Models\Base\TVerifyCode
{
	protected $fillable = [
		'mobile',
		'code',
		'create_tm',
		'type',
		'state'
	];
}
