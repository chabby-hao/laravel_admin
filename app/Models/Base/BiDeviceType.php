<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 28 Mar 2018 15:12:02 +0800.
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
