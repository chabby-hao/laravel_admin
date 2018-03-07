<?php

namespace App\Models;

/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $queue
 * @property string $payload
 * @property int $attempts
 * @property int $reserved_at
 * @property int $available_at
 * @property int $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Job whereAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Job whereAvailableAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Job wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Job whereQueue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Job whereReservedAt($value)
 * @mixin \Eloquent
 */
class Job extends \App\Models\Base\Job
{
	protected $fillable = [
		'queue',
		'payload',
		'attempts',
		'reserved_at',
		'available_at'
	];
}
