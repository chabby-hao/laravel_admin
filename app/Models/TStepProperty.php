<?php

namespace App\Models;

/**
 * App\Models\TStepProperty
 *
 * @property string $udid
 * @property int $birthday
 * @property int $height
 * @property int $weight
 * @property int $gender
 * @property int $register
 * @property int $target
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepProperty whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepProperty whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepProperty whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepProperty whereRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepProperty whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepProperty whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStepProperty whereWeight($value)
 * @mixin \Eloquent
 */
class TStepProperty extends \App\Models\Base\TStepProperty
{
	protected $fillable = [
		'birthday',
		'height',
		'weight',
		'gender',
		'register',
		'target'
	];
}
