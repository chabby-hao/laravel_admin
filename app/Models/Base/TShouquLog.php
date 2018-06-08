<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TShouquLog
 * 
 * @property int $id
 * @property int $last_time
 * @property string $post_data
 * @property string $udid
 *
 * @package App\Models\Base
 */
class TShouquLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_shouqu_log';
	public $timestamps = false;

	protected $casts = [
		'last_time' => 'int'
	];
}
