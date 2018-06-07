<?php

namespace App\Models;

/**
 * App\Models\TDeviceApply
 *
 * @property int $sid
 * @property string $udid
 * @property int $proposer
 * @property int $status
 * @property \Carbon\Carbon|null $create_tm
 * @property \Carbon\Carbon|null $finish_tm
 * @property string|null $content
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceApply whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceApply whereCreateTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceApply whereFinishTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceApply whereProposer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceApply whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceApply whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceApply whereUdid($value)
 * @mixin \Eloquent
 */
class TDeviceApply extends \App\Models\Base\TDeviceApply
{
	protected $fillable = [
		'udid',
		'proposer',
		'status',
		'create_tm',
		'finish_tm',
		'content'
	];
}
