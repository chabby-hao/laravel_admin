<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TErrorLog
 *
 * @property int $id
 * @property string $d_code
 * @property string $msg
 * @property int $log_time
 * @property int $add_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TErrorLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TErrorLog whereDCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TErrorLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TErrorLog whereLogTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TErrorLog whereMsg($value)
 * @mixin \Eloquent
 */
class TErrorLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_error_log';
	public $timestamps = false;

	protected $casts = [
		'log_time' => 'int',
		'add_time' => 'int'
	];
}
