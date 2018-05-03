<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 May 2018 15:35:38 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureType
 * 
 * @property int $id
 * @property string $name
 * @property string $provider
 * @property int $max_compensation
 * @property int $time_length
 *
 * @package App\Models\Base
 */
class TInsureType extends Eloquent
{
	protected $connection = 'care_operate';
	protected $table = 't_insure_type';
	public $timestamps = false;

	protected $casts = [
		'max_compensation' => 'int',
		'time_length' => 'int'
	];
}
