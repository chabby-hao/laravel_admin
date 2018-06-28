<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TStepProperty
 *
 * @property string $udid
 * @property int $birthday
 * @property int $height
 * @property int $weight
 * @property int $gender
 * @property int $register
 * @property int $target
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepProperty whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepProperty whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepProperty whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepProperty whereRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepProperty whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepProperty whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TStepProperty whereWeight($value)
 * @mixin \Eloquent
 */
class TStepProperty extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_step_property';
	protected $primaryKey = 'udid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'birthday' => 'int',
		'height' => 'int',
		'weight' => 'int',
		'gender' => 'int',
		'register' => 'int',
		'target' => 'int'
	];
}
