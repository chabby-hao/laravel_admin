<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 02 Mar 2018 17:54:15 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiWarningUser
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $email_address
 *
 * @package App\Models
 */
class BiWarningUser extends Eloquent
{
	protected $connection = 'bi';

	protected $fillable = [
		'name',
		'email_address'
	];
}
