<?php

namespace App\Models;

/**
 * App\Models\TApnsFeedback
 *
 * @property string $token
 * @property \Carbon\Carbon|null $time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TApnsFeedback whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TApnsFeedback whereToken($value)
 * @mixin \Eloquent
 */
class TApnsFeedback extends \App\Models\Base\TApnsFeedback
{
	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'time'
	];
}
