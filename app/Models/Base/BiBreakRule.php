<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Aug 2018 20:07:31 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiBreakRule
 * 
 * @property int $id
 * @property string $lpn
 * @property string $car_username
 * @property string $car_phone
 * @property string $car_factory
 * @property int $violation_type
 * @property \Carbon\Carbon $violation_time
 * @property string $violation_location
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiBreakRule extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'violation_type' => 'int'
	];

	protected $dates = [
		'violation_time'
	];
}
