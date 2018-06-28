<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TApnsFeedback
 *
 * @property string $token
 * @property \Carbon\Carbon $time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TApnsFeedback whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TApnsFeedback whereToken($value)
 * @mixin \Eloquent
 */
class TApnsFeedback extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_apns_feedback';
	protected $primaryKey = 'token';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'time'
	];
}
