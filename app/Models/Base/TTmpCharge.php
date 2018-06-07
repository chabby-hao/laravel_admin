<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TTmpCharge
 * 
 * @property int $id
 * @property string $BMSID
 * @property string $IMEID
 * @property string $IMSID
 * @property string $total
 * @property string $type
 * @property string $longitude
 * @property string $latitude
 * @property string $start_rank
 * @property string $end_rank
 * @property string $start_time
 * @property string $time_segment
 * @property string $code
 * @property string $volume
 * @property string $direct
 * @property string $sign
 * @property string $method
 * @property \Carbon\Carbon $add_time
 *
 * @package App\Models\Base
 */
class TTmpCharge extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_tmp_charge';
	public $timestamps = false;

	protected $dates = [
		'add_time'
	];
}
