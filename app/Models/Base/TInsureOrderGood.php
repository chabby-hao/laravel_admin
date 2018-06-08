<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureOrderGood
 * 
 * @property int $id
 * @property int $pay_order_id
 * @property int $insure_goods_id
 * @property int $insure_order_id
 *
 * @package App\Models\Base
 */
class TInsureOrderGood extends Eloquent
{
	protected $connection = 'care';
	public $timestamps = false;

	protected $casts = [
		'pay_order_id' => 'int',
		'insure_goods_id' => 'int',
		'insure_order_id' => 'int'
	];
}
