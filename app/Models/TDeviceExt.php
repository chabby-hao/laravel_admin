<?php

namespace App\Models;

/**
 * App\Models\TDeviceExt
 *
 * @property string $udid
 * @property string|null $person
 * @property int $gender
 * @property int $age
 * @property string|null $place
 * @property \Carbon\Carbon|null $birthday
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $contact
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt wherePerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceExt whereUdid($value)
 * @mixin \Eloquent
 */
class TDeviceExt extends \App\Models\Base\TDeviceExt
{
	protected $fillable = [
		'person',
		'gender',
		'age',
		'place',
		'birthday',
		'address',
		'phone',
		'contact'
	];
}
