<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 14:54:57 +0800.
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
