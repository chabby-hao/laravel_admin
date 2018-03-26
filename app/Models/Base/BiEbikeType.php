<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Mar 2018 15:46:27 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiEbikeType
 * 
 * @property int $id
 * @property int $ev_model
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
		'ev_model' => 'int',
		'brand_id' => 'int'
	];
}
