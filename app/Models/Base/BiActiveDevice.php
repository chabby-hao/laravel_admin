<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Aug 2018 10:56:20 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiActiveDevice
 * 
 * @property int $id
 * @property string $date
 * @property int $total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiActiveDevice extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'total' => 'int'
	];
}
