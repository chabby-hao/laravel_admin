<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDewinBasicLog
 *
 * @property int $id
 * @property string $udid
 * @property int $status
 * @property int $is_online
 * @property int $c_total_mileage
 * @property int $total_mileage
 * @property int $charge_number
 * @property \Carbon\Carbon $create_time
 * @property string $json_post
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereCTotalMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereChargeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereJsonPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereTotalMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDewinBasicLog whereUdid($value)
 * @mixin \Eloquent
 */
class TDewinBasicLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_dewin_basic_log';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'is_online' => 'int',
		'c_total_mileage' => 'int',
		'total_mileage' => 'int',
		'charge_number' => 'int'
	];

	protected $dates = [
		'create_time'
	];
}
