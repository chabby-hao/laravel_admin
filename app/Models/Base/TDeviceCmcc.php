<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceCmcc
 * 
 * @property string $imsi
 *
 * @package App\Models\Base
 */
class TDeviceCmcc extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_cmcc';
	protected $primaryKey = 'imsi';
	public $incrementing = false;
	public $timestamps = false;
}
