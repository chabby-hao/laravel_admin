<?php

namespace App\Models;

/**
 * App\Models\TInsureGood
 *
 * @property int $goods_id 商品id
 * @property string|null $goods_title 保险商品标题
 * @property string|null $goods_desc 保险商品描述
 * @property float $goods_price 保险商品价格
 * @property int $sort 排序，数字大排前面
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureGood whereGoodsDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureGood whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureGood whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureGood whereGoodsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureGood whereSort($value)
 * @mixin \Eloquent
 */
class TInsureGood extends \App\Models\Base\TInsureGood
{
	protected $fillable = [
		'goods_title',
		'goods_desc',
		'goods_price',
		'sort'
	];
}
