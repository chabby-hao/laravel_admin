<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TTmpDischarge
 * 
 * @property int $id
 * @property string $BMSID
 * @property string $IMEID
 * @property string $IMSID
 * @property string $type
 * @property string $start_voltage
 * @property string $end_voltage
 * @property string $index
 * @property string $volume
 * @property string $direct
 * @property string $sign
 * @property string $method
 * @property \Carbon\Carbon $add_time
 * @property string $time_segment
 *
 * @package App\Models\Base
 */
class TTmpDischarge extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_tmp_discharge';
	public $timestamps = false;

	protected $dates = [
		'add_time'
	];
}
