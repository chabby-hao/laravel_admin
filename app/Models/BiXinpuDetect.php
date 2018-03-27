<?php

namespace App\Models;

/**
 * App\Models\BiXinpuDetect
 *
 * @property int $id
 * @property int $rom
 * @property string|null $mcu
 * @property int $net
 * @property int $bat_conn
 * @property int $gps
 * @property string|null $gps_text
 * @property int $gsm
 * @property string|null $gsm_text
 * @property string|null $data_conn
 * @property int $vol
 * @property string|null $vol_text
 * @property string|null $result
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $check_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $cost_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereBatConn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereCheckAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereCostTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereDataConn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereGps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereGpsText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereGsm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereGsmText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereMcu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereRom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereVol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereVolText($value)
 * @mixin \Eloquent
 * @property string $imei
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiXinpuDetect whereImei($value)
 */
class BiXinpuDetect extends \App\Models\Base\BiXinpuDetect
{
	protected $fillable = [
		'rom',
		'mcu',
		'net',
		'bat_conn',
		'gps',
		'gps_text',
		'gsm',
		'gsm_text',
		'data_conn',
		'vol',
		'vol_text',
		'result',
		'check_at',
		'cost_time',
        'imei',
	];
}
