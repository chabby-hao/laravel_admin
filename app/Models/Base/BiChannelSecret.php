<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiChannelSecret
 *
 * @property int $id
 * @property int $channel_id
 * @property string $channel_name
 * @property string $secret
 * @property string $push_url
 * @property string $push_types
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSecret whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSecret whereChannelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSecret whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSecret whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSecret wherePushTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSecret wherePushUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSecret whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSecret whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiChannelSecret extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_channel_secret';

	protected $casts = [
		'channel_id' => 'int'
	];
}
