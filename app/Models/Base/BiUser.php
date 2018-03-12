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
 * @package App\Models\Base
 * @property int|null $last_ip
 * @property string|null $last_record
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereLastRecord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereUsername($value)
 * @mixin \Eloquent
 * @property int|null $type_id 渠道ID or 品牌id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereTypeId($value)
 * @property string|null $email
 * @property string|null $remember_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereRememberToken($value)
 * @property bool $user_type 0=全部，1=渠道商，2=品牌商
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereUserType($value)
 * @property string|null $login_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiUser whereLoginAt($value)
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
