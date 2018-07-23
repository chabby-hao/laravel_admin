<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 16:51:04 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiDeviceType
 * 
 * @property int $id
 * @property string $name
 * @property string $remark
 *
 * @package App\Models\Base
 */
class BiDeviceType extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;
}
