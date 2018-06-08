<?php

namespace App\Models;

/**
 * App\Models\TShouquLog
 *
 * @property int $id
 * @property int $last_time
 * @property string $post_data
 * @property string $udid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TShouquLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TShouquLog whereLastTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TShouquLog wherePostData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TShouquLog whereUdid($value)
 * @mixin \Eloquent
 */
class TShouquLog extends \App\Models\Base\TShouquLog
{
	protected $fillable = [
		'last_time',
		'post_data',
		'udid'
	];
}
