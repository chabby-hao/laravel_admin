<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureGood
 * 
 * @property int $goods_id
 * @property string $goods_title
 * @property string $goods_desc
 * @property float $goods_price
 * @property int $sort
 *
 * @package App\Models\Base
 */
class TInsureGood extends Eloquent
{
	protected $connection = 'care';
	protected $primaryKey = 'goods_id';
	public $timestamps = false;

	protected $casts = [
		'goods_price' => 'float',
		'sort' => 'int'
	];
}
