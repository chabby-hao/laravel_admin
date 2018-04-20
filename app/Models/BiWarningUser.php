<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Feb 2018 08:00:20 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiWarningUser
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @property string|null $email_address
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiWarningUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiWarningUser extends Eloquent
{
    use Notifiable;

    protected $connection = 'bi';

    protected $fillable = [
        'name',
        'email_address'
    ];

    public function routeNotificationForMail()
    {
        return $this->email_address;
    }
}
