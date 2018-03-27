<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Mar 2018 17:08:59 +0800.
 */

namespace App\Models\Base;

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
 * @package App\Models\Base
 */
class BiWarningUser extends Eloquent
{
	protected $connection = 'bi';
}
