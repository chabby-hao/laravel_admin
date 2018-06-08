<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceFeedback
 * 
 * @property int $sid
 * @property int $uid
 * @property string $udid
 * @property \Carbon\Carbon $time
 * @property string $type
 * @property string $content
 * @property string $phone
 * @property string $name
 * @property string $contact
 *
 * @package App\Models\Base
 */
class TDeviceFeedback extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_feedback';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int'
	];

	protected $dates = [
		'time'
	];
}
