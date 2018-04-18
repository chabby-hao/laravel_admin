<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 18:46:20 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TPayment
 * 
 * @property string $udid
 * @property int $expire
 * @property int $status
 *
 * @package App\Models\Base
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