<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TSportDate
 * 
 * @property string $udid
 * @property int $year
 * @property int $month
 * @property int $days
 *
 * @package App\Models\Base
 */
class TSportDate extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_sport_date';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'year' => 'int',
		'month' => 'int',
		'days' => 'int'
	];
}
