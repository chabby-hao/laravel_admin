<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Apr 2018 15:00:41 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiProductType
 *
 * @property int $id
 * @property string $product_name
 * @property string $product_remark
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiProductType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiProductType whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiProductType whereProductRemark($value)
 * @mixin \Eloquent
 */
class BiProductType extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;
}
