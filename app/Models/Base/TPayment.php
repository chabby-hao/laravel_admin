<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 17:17:25 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TPayment
 *
 * @property string $udid
 * @property int $expire
 * @property int $status
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPayment whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPayment whereUdid($value)
 * @mixin \Eloquent
 */
class TPayment extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_payment';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'expire' => 'int',
		'status' => 'int'
	];
}
