<?php

namespace App\Models;

/**
 * App\Models\BiOrder
 *
 * @property int $id
 * @property int $state 状态,0=未完成，1=已完成，2=已作废
 * @property int $channel_id 渠道
 * @property int $order_quantity 订单数量
 * @property int $product_type 设备型号,B
 * @property \Carbon\Carbon|null $expect_delivery 期望交货时间
 * @property int $after_sale 售后订单,0=不是，1=是
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereAfterSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereExpectDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereOrderQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereProductType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $remark 备注
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOrder whereRemark($value)
 */
class BiOrder extends \App\Models\Base\BiOrder
{
	protected $fillable = [
		'state',
		'channel_id',
		'order_quantity',
		'product_type',
		'expect_delivery',
		'after_sale',
        'remark',
	];
}
