<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TSalesDevice
 *
 * @property string $imei
 * @property string $udid
 * @property \Carbon\Carbon $active
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSalesDevice whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSalesDevice whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TSalesDevice whereUdid($value)
 * @mixin \Eloquent
 */
class TSalesDevice extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_sales_device';
	protected $primaryKey = 'imei';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'active'
	];
}
