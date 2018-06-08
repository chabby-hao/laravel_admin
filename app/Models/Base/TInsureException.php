<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureException
 * 
 * @property string $order_id
 * @property \Carbon\Carbon $occur_tm
 * @property int $status
 * @property string $code
 * @property string $detail
 *
 * @package App\Models\Base
 */
class TInsureException extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_insure_exception';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $dates = [
		'occur_tm'
	];
}
