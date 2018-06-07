<?php

namespace App\Models;

/**
 * App\Models\TTestCmdLog
 *
 * @property int $id
 * @property string|null $udid
 * @property string|null $cmd_name
 * @property int $add_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestCmdLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestCmdLog whereCmdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestCmdLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestCmdLog whereUdid($value)
 * @mixin \Eloquent
 */
class TTestCmdLog extends \App\Models\Base\TTestCmdLog
{
	protected $fillable = [
		'udid',
		'cmd_name',
		'add_time'
	];
}
