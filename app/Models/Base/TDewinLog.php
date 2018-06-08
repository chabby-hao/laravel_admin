<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDewinLog
 * 
 * @property int $id
 * @property string $post_data
 * @property \Carbon\Carbon $last_time
 * @property string $udid
 *
 * @package App\Models\Base
 */
class TDewinLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_dewin_log';
	public $timestamps = false;

	protected $dates = [
		'last_time'
	];
}
