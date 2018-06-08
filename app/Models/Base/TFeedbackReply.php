<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TFeedbackReply
 * 
 * @property int $sid
 * @property int $type
 * @property string $content
 * @property \Carbon\Carbon $time
 * @property int $uid
 *
 * @package App\Models\Base
 */
class TFeedbackReply extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_feedback_reply';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'sid' => 'int',
		'type' => 'int',
		'uid' => 'int'
	];

	protected $dates = [
		'time'
	];
}
