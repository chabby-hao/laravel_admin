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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TFeedbackReply whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TFeedbackReply whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TFeedbackReply whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TFeedbackReply whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TFeedbackReply whereUid($value)
 * @mixin \Eloquent
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
