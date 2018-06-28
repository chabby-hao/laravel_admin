<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TZoneMsg
 *
 * @property int $mid
 * @property string $udid
 * @property int $zid
 * @property int $state
 * @property int $time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneMsg whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneMsg whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneMsg whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneMsg whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TZoneMsg whereZid($value)
 * @mixin \Eloquent
 */
class TZoneMsg extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_zone_msg';
	protected $primaryKey = 'mid';
	public $timestamps = false;

	protected $casts = [
		'zid' => 'int',
		'state' => 'int',
		'time' => 'int'
	];
}
