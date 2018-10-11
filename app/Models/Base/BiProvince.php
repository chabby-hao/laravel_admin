<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Oct 2018 16:13:45 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiProvince
 * 
 * @property int $id
 * @property string $province
 * @property string $short_name
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
