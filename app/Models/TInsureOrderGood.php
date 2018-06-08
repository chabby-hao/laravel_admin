<?php

namespace App\Models;

/**
 * App\Models\TInsureOrderGood
 *
 * @property int $id
 * @property int $pay_order_id
 * @property int $insure_goods_id
 * @property int $insure_order_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderGood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderGood whereInsureGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderGood whereInsureOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrderGood wherePayOrderId($value)
 * @mixin \Eloquent
 */
class TInsureOrderGood extends \App\Models\Base\TInsureOrderGood
{
	protected $fillable = [
		'pay_order_id',
		'insure_goods_id',
		'insure_order_id'
	];
}
