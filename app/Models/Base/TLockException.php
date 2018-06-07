<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TLockException
 * 
 * @property string $udid
 * @property int $event_tm
 *
 * @package App\Models\Base
 */
class TLockException extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_lock_exception';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'event_tm' => 'int'
	];
}
