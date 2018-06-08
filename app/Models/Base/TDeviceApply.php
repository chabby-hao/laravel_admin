<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceApply
 * 
 * @property int $sid
 * @property string $udid
 * @property int $proposer
 * @property int $status
 * @property \Carbon\Carbon $create_tm
 * @property \Carbon\Carbon $finish_tm
 * @property string $content
 *
 * @package App\Models\Base
 */
class TDeviceApply extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_apply';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'proposer' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'create_tm',
		'finish_tm'
	];
}
