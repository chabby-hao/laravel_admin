<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceExtra
 * 
 * @property string $manufacturer
 * @property string $model
 *
 * @package App\Models\Base
 */
class TDeviceExtra extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_extra';
	public $incrementing = false;
	public $timestamps = false;
}
