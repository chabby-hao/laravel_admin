<?php

namespace App\Models;

/**
 * App\Models\TWarningLog
 *
 * @property int $id
 * @property string $udid
 * @property string|null $warning_info
 * @property int $add_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TWarningLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TWarningLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TWarningLog whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TWarningLog whereWarningInfo($value)
 * @mixin \Eloquent
 */
class TWarningLog extends \App\Models\Base\TWarningLog
{
	protected $fillable = [
		'udid',
		'warning_info',
		'add_time'
	];
}
