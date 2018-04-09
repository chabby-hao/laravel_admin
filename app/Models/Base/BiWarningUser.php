<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Apr 2018 15:00:41 +0800.
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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiWarningUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiWarningUser whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiWarningUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiWarningUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiWarningUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiWarningUser extends Eloquent
{
	protected $connection = 'bi';
}
