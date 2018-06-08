<?php

namespace App\Models;

/**
 * App\Models\TDeviceFeedback
 *
 * @property int $sid
 * @property int $uid
 * @property string|null $udid
 * @property \Carbon\Carbon|null $time
 * @property string|null $type
 * @property string|null $content
 * @property string|null $phone
 * @property string|null $name
 * @property string|null $contact
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceFeedback whereUid($value)
 * @mixin \Eloquent
 */
class TDeviceFeedback extends \App\Models\Base\TDeviceFeedback
{
	protected $fillable = [
		'uid',
		'udid',
		'time',
		'type',
		'content',
		'phone',
		'name',
		'contact'
	];
}
