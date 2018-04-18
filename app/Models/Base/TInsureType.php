<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 18:11:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureType
 *
 * @property int $id
 * @property string $name
 * @property string $provider
 * @property int $max_compensation
 * @property int $time_length
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureType whereMaxCompensation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureType whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureType whereTimeLength($value)
 * @mixin \Eloquent
 */
class TInsureType extends Eloquent
{
	protected $connection = 'care_operate';
	protected $table = 't_insure_type';
	public $timestamps = false;

	protected $casts = [
		'max_compensation' => 'int',
		'time_length' => 'int'
	];
}
