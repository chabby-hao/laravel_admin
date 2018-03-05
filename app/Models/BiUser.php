<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 02 Mar 2018 17:54:15 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiUser
 * 
 * @property int $id
 * @property string $username
 * @property string $password
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $type
 * @property int $channel
 * @property int $factory_id
 *
 * @package App\Models
 */
class BiUser extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'type' => 'int',
		'channel' => 'int',
		'factory_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'type',
		'channel',
		'factory_id'
	];
}
