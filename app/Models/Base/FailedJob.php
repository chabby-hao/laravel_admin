<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Apr 2018 16:11:32 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FailedJob
 * 
 * @property int $id
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property \Carbon\Carbon $failed_at
 *
 * @package App\Models\Base
 */
class FailedJob extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;

	protected $dates = [
		'failed_at'
	];
}
