<?php

namespace App\Models;

/**
 * App\Models\TInsureException
 *
 * @property string $order_id
 * @property \Carbon\Carbon $occur_tm
 * @property int $status
 * @property string|null $code
 * @property string|null $detail
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureException whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureException whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureException whereOccurTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureException whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureException whereStatus($value)
 * @mixin \Eloquent
 */
class TInsureException extends \App\Models\Base\TInsureException
{
	protected $fillable = [
		'status',
		'code',
		'detail'
	];
}
