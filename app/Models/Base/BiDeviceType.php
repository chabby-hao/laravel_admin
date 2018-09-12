<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiDeviceType
 *
 * @property int $id
 * @property string $name
 * @property string $remark
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeviceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeviceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiDeviceType whereRemark($value)
 * @mixin \Eloquent
 */
class BiDeviceType extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;
}
