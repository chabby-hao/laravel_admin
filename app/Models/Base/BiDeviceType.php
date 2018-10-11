<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Oct 2018 16:13:45 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiDeviceType
 * 
 * @property int $id
 * @property string $name
 * @property string $remark
 * @property string $options
 *
 * @package App\Models\Base
 */
class BiDeviceType extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;
}
