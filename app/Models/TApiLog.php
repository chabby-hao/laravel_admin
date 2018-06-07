<?php

namespace App\Models;

/**
 * App\Models\TApiLog
 *
 * @property int $sid
 * @property int $type
 * @property \Carbon\Carbon $call_tm
 * @property string|null $key
 * @property int $response
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TApiLog whereCallTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TApiLog whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TApiLog whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TApiLog whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TApiLog whereType($value)
 * @mixin \Eloquent
 */
class TApiLog extends \App\Models\Base\TApiLog
{
	protected $fillable = [
		'type',
		'call_tm',
		'key',
		'response'
	];
}
