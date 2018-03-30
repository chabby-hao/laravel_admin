<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 30 Mar 2018 16:45:41 +0800.
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
