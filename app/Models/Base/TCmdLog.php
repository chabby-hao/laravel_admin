<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TCmdLog
 * 
 * @property int $id
 * @property string $cmd
 * @property int $type
 * @property \Carbon\Carbon $add_time
 * @property string $imei
 * @property string $channel
 *
 * @package App\Models\Base
 */
class TCmdLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_cmd_log';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int'
	];

	protected $dates = [
		'add_time'
	];
}
