<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Oct 2018 16:13:45 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiActiveCityDevice
 * 
 * @property int $id
 * @property int $pid
 * @property string $date
 * @property string $udid
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiActiveCityDevice extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'pid' => 'int'
	];
}
