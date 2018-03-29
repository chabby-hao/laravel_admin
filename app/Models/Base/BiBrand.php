<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 19:47:25 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiBrand
 * 
 * @property int $id
 * @property string $brand_name
 * @property string $brand_remark
 *
 * @package App\Models\Base
 */
class BiBrand extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;
}
