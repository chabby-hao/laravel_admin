<?php

namespace App\Models;

/**
 * App\Models\BiChannelSecret
 *
 * @property int $id
 * @property int $channel_id
 * @property string $channel_name
 * @property string $secret
 * @property string $push_url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSecret whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSecret whereChannelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSecret whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSecret whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSecret whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSecret whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSecret wherePushUrl($value)
 * @mixin \Eloquent
 */
class BiChannelSecret extends \App\Models\Base\BiChannelSecret
{

	protected $fillable = [
		'channel_id',
		'channel_name',
		'secret',
        'push_url'
	];
}
