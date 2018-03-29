<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 19:47:25 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiEbikeType
 * 
 * @property int $id
 * @property string $ebike_name
 * @property string $ebike_remark
 * @property int $brand_id
 *
 * @package App\Models\Base
 */
class BiEbikeType extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_ebike_type';
	public $timestamps = false;

	protected $casts = [
		'brand_id' => 'int'
	];
}
