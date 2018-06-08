<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TFeedback
 * 
 * @property int $sid
 * @property int $uid
 * @property \Carbon\Carbon $time
 * @property string $type
 * @property string $content
 * @property string $phone
 * @property string $name
 *
 * @package App\Models\Base
 */
class TFeedback extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_feedback';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int'
	];

	protected $dates = [
		'time'
	];
}
