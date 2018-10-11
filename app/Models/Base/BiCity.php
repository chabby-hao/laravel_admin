<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Oct 2018 16:13:45 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiCity
 * 
 * @property int $id
 * @property string $city
 * @property int $pid
 *
 * @package App\Models\Base
 */
class BiCity extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_city';
	public $timestamps = false;

	protected $casts = [
		'pid' => 'int'
	];
}
