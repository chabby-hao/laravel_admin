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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureException whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureException whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureException whereOccurTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureException whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureException whereStatus($value)
 * @mixin \Eloquent
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
