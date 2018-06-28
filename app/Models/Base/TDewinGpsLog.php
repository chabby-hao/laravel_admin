<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDewinGpsLog
 *
 * @property int $id
 * @property string $udid
 * @property float $lat
 * @property float $lng
 * @property int $create_time
 * @property int $add_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinGpsLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinGpsLog whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinGpsLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinGpsLog whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinGpsLog whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinGpsLog whereUdid($value)
 * @mixin \Eloquent
 */
class TDewinGpsLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_dewin_gps_log';
	public $timestamps = false;

	protected $casts = [
		'lat' => 'float',
		'lng' => 'float',
		'create_time' => 'int',
		'add_time' => 'int'
	];
}
