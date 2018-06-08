<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TIgnoreTmp
 * 
 * @property string $imei
 *
 * @package App\Models\Base
 */
class TIgnoreTmp extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ignore_tmp';
	protected $primaryKey = 'imei';
	public $incrementing = false;
	public $timestamps = false;
}
