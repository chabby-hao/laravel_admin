<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 19:47:26 +0800.
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
 *
 * @package App\Models\Base
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
