<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Mar 2018 18:26:39 +0800.
 */

namespace App\Models\Base;

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
 * @package App\Models\Base
 */
class BiUser extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'type' => 'int',
		'channel' => 'int',
		'factory_id' => 'int'
	];
}
