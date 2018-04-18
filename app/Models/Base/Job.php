<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 16:52:59 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Job
 *
 * @property int $id
 * @property string $queue
 * @property string $payload
 * @property int $attempts
 * @property int $reserved_at
 * @property int $available_at
 * @property int $created_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Job whereAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Job whereAvailableAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Job wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Job whereQueue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Job whereReservedAt($value)
 * @mixin \Eloquent
 */
class Job extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;

	protected $casts = [
		'attempts' => 'int',
		'reserved_at' => 'int',
		'available_at' => 'int',
		'created_at' => 'int'
	];
}
