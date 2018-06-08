<?php

namespace App\Models;

/**
 * App\Models\TFeedbackReply
 *
 * @property int $sid
 * @property int $type
 * @property string|null $content
 * @property \Carbon\Carbon|null $time
 * @property int $uid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedbackReply whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedbackReply whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedbackReply whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedbackReply whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedbackReply whereUid($value)
 * @mixin \Eloquent
 */
class TFeedbackReply extends \App\Models\Base\TFeedbackReply
{
	protected $fillable = [
		'content',
		'time',
		'uid'
	];
}
