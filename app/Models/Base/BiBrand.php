<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Aug 2018 14:28:34 +0800.
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
