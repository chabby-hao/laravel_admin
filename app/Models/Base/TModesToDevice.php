<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TModesToDevice
 * 
 * @property int $device_type
 * @property int $mode_id
 *
 * @package App\Models\Base
 */
class TModesToDevice extends Eloquent
{
	protected $connection = 'care';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'device_type' => 'int',
		'mode_id' => 'int'
	];
}
