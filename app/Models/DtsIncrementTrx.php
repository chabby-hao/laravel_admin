<?php

namespace App\Models;

/**
 * App\Models\DtsIncrementTrx
 *
 * @property string $job_id
 * @property int $partition
 * @property string|null $checkpoint
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DtsIncrementTrx whereCheckpoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DtsIncrementTrx whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DtsIncrementTrx wherePartition($value)
 * @mixin \Eloquent
 */
class DtsIncrementTrx extends \App\Models\Base\DtsIncrementTrx
{
	protected $fillable = [
		'checkpoint'
	];
}
