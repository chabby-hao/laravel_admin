<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvSituation
 *
 * @property string $udid
 * @property int $code
 * @property int $check_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvSituation whereCheckTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvSituation whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TEvSituation whereUdid($value)
 * @mixin \Eloquent
 */
class TEvSituation extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ev_situation';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code' => 'int',
		'check_time' => 'int'
	];
}
