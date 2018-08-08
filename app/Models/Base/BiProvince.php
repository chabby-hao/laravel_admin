<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Aug 2018 19:43:20 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiProvince
 * 
 * @property int $id
 * @property string $province
 *
 * @package App\Models\Base
 */
class BiProvince extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_province';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];
}
