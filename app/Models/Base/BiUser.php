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
