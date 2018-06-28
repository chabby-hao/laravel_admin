<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TTestCmdLog
 *
 * @property int $id
 * @property string $udid
 * @property string $cmd_name
 * @property int $add_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestCmdLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestCmdLog whereCmdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestCmdLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestCmdLog whereUdid($value)
 * @mixin \Eloquent
 */
class TTestCmdLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_test_cmd_log';
	public $timestamps = false;

	protected $casts = [
		'add_time' => 'int'
	];
}
