<?php

namespace App\Models;

/**
 * App\Models\TPayment
 *
 * @property string $udid
 * @property int $expire
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPayment whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPayment whereUdid($value)
 * @mixin \Eloquent
 */
class TPayment extends \App\Models\Base\TPayment
{
	protected $fillable = [
		'expire',
		'status'
	];
}
