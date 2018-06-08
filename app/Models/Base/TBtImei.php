<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TBtImei
 * 
 * @property string $bt_mac
 *
 * @package App\Models\Base
 */
class TBtImei extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_bt_imei';
	public $incrementing = false;
	public $timestamps = false;
}
