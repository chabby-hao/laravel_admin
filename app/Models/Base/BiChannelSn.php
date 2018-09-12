<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiChannelSn
 *
 * @property int $id
 * @property int $channel_id
 * @property string $sn
 * @property \Carbon\Carbon $created_at
 * @property int $updated_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSn whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSn whereSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannelSn whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiChannelSn extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_channel_sn';

	protected $casts = [
		'channel_id' => 'int',
		'updated_at' => 'int'
	];
}
