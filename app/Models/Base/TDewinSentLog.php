<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDewinSentLog
 * 
 * @property int $id
 * @property string $post_data
 * @property \Carbon\Carbon $sent_time
 * @property string $udid
 * @property int $total_mileage
 * @property int $gps_mileage
 * @property int $charge_number
 *
 * @package App\Models\Base
 */
class TDewinSentLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_dewin_sent_log';
	public $timestamps = false;

	protected $casts = [
		'total_mileage' => 'int',
		'gps_mileage' => 'int',
		'charge_number' => 'int'
	];

	protected $dates = [
		'sent_time'
	];
}
