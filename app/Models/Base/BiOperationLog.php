<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Oct 2018 16:13:45 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiOperationLog
 * 
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property int $type
 * @property int $desc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiOperationLog extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_operation_log';

	protected $casts = [
		'user_id' => 'int',
		'type' => 'int',
		'desc' => 'int'
	];
}
