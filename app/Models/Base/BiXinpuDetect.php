<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiXinpuDetect
 *
 * @property int $id
 * @property string $imei
 * @property int $rom
 * @property string $mcu
 * @property int $net
 * @property int $bat_conn
 * @property int $gps
 * @property string $gps_text
 * @property int $gsm
 * @property string $gsm_text
 * @property string $data_conn
 * @property int $vol
 * @property string $vol_text
 * @property string $result
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $check_at
 * @property \Carbon\Carbon $updated_at
 * @property int $cost_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereBatConn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereCheckAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereCostTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereDataConn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereGps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereGpsText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereGsm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereGsmText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereMcu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereRom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereVol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiXinpuDetect whereVolText($value)
 * @mixin \Eloquent
 */
class BiXinpuDetect extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_xinpu_detect';

	protected $casts = [
		'rom' => 'int',
		'net' => 'int',
		'bat_conn' => 'int',
		'gps' => 'int',
		'gsm' => 'int',
		'vol' => 'int',
		'cost_time' => 'int'
	];

	protected $dates = [
		'check_at'
	];
}
