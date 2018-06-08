<?php

namespace App\Models;

/**
 * App\Models\TFeedback
 *
 * @property int $sid
 * @property int $uid
 * @property \Carbon\Carbon|null $time
 * @property string|null $type
 * @property string|null $content
 * @property string|null $phone
 * @property string|null $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedback whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedback whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedback wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedback whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedback whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedback whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TFeedback whereUid($value)
 * @mixin \Eloquent
 */
class TFeedback extends \App\Models\Base\TFeedback
{
	protected $fillable = [
		'uid',
		'time',
		'type',
		'content',
		'phone',
		'name'
	];
}
