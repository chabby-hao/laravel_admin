<?php

namespace App\Models;

/**
 * App\Models\BiChannelSn
 *
 * @property int $id
 * @property int $channel_id
 * @property string $sn 工装号
 * @property \Carbon\Carbon|null $created_at
 * @property int $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSn whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSn whereSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiChannelSn whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiChannelSn extends \App\Models\Base\BiChannelSn
{
	protected $fillable = [
		'channel_id',
		'sn'
	];
}
