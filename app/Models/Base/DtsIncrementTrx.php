<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DtsIncrementTrx
 * 
 * @property string $job_id
 * @property int $partition
 * @property string $checkpoint
 *
 * @package App\Models\Base
 */
class DtsIncrementTrx extends Eloquent
{
	protected $connection = 'care';
	protected $table = 'dts_increment_trx';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'partition' => 'int'
	];
}
