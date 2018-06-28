<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TMessageLog
 *
 * @property int $id
 * @property string $udid
 * @property int $stime
 * @property int $event_id
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TMessageLog whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TMessageLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TMessageLog whereStime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TMessageLog whereUdid($value)
 * @mixin \Eloquent
 */
class TMessageLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_message_log';
	public $timestamps = false;

	protected $casts = [
		'stime' => 'int',
		'event_id' => 'int'
	];
}
