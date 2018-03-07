<?php

namespace App\Models;

/**
 * App\Models\BiUser
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $type 0=内部，1=渠道，2=工厂
 * @property int $channel 渠道id
 * @property int $factory_id 工厂id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereFactoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereUsername($value)
 * @mixin \Eloquent
 */
class BiUser extends \App\Models\Base\BiUser
{
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
