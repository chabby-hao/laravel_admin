<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Apr 2018 15:00:41 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property \Carbon\Carbon $created_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\PasswordReset whereToken($value)
 * @mixin \Eloquent
 */
class PasswordReset extends Eloquent
{
	protected $connection = 'bi';
	public $incrementing = false;
	public $timestamps = false;
}
