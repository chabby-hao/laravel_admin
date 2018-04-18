<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 16:52:59 +0800.
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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\FailedJob whereConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\FailedJob whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\FailedJob whereFailedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\FailedJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\FailedJob wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\FailedJob whereQueue($value)
 * @mixin \Eloquent
 */
class FailedJob extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;

	protected $dates = [
		'failed_at'
	];
}
