<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Oct 2018 16:13:45 +0800.
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
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiChannelSn extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_channel_sn';

	protected $casts = [
		'channel_id' => 'int'
	];
}
