<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:36:39 +0800.
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
