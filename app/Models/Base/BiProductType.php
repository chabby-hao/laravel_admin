<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 28 Mar 2018 15:12:03 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiProductType
 * 
 * @property int $id
 * @property string $product_name
 * @property string $product_remark
 *
 * @package App\Models\Base
 */
class BiProductType extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;
}
