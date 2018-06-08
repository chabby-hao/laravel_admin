<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TVersion
 * 
 * @property int $ver
 * @property \Carbon\Carbon $update_tm
 * @property string $url
 * @property int $code
 * @property string $name
 * @property string $content
 * @property int $sys
 * @property int $force
 * @property int $channel
 *
 * @package App\Models\Base
 */
class TVersion extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_version';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ver' => 'int',
		'code' => 'int',
		'sys' => 'int',
		'force' => 'int',
		'channel' => 'int'
	];

	protected $dates = [
		'update_tm'
	];
}
