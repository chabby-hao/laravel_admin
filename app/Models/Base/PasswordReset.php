<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Mar 2018 17:08:59 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PasswordReset
 * 
 * @property string $email
 * @property string $token
 * @property \Carbon\Carbon $created_at
 *
 * @package App\Models\Base
 */
class PasswordReset extends Eloquent
{
	protected $connection = 'bi';
	public $incrementing = false;
	public $timestamps = false;
}
