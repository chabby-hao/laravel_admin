<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TWarningLog
 *
 * @property int $id
 * @property string $udid
 * @property string $warning_info
 * @property int $add_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TWarningLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TWarningLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TWarningLog whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TWarningLog whereWarningInfo($value)
 * @mixin \Eloquent
 */
class TWarningLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_warning_log';
	public $timestamps = false;

	protected $casts = [
		'add_time' => 'int'
	];
}
