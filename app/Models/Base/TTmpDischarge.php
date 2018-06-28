<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TTmpDischarge
 *
 * @property int $id
 * @property string $BMSID
 * @property string $IMEID
 * @property string $IMSID
 * @property string $type
 * @property string $start_voltage
 * @property string $end_voltage
 * @property string $index
 * @property string $volume
 * @property string $direct
 * @property string $sign
 * @property string $method
 * @property \Carbon\Carbon $add_time
 * @property string $time_segment
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereBMSID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereDirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereEndVoltage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereIMEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereIMSID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereStartVoltage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereTimeSegment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpDischarge whereVolume($value)
 * @mixin \Eloquent
 */
class TTmpDischarge extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_tmp_discharge';
	public $timestamps = false;

	protected $dates = [
		'add_time'
	];
}
