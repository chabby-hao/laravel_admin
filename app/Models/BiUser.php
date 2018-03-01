<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Feb 2018 08:00:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiUser
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $channel
 * @property int $brand
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereUsername($value)
 * @mixin \Eloquent
 */
class BiUser extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'channel' => 'int',
		'brand' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'channel',
		'brand'
	];
}
