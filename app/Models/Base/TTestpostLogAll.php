<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TTestpostLog
 *
 * @property int $id
 * @property string $mstsn
 * @property int $cinum
 * @property \Carbon\Carbon $addtime
 * @property string $json_data
 * @property string $imsi
 * @package App\Models\Base
 * @mixin \Eloquent
 */
class TTestpostLogAll extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_testpost_log_all';
	public $timestamps = false;

	protected $casts = [
		'cinum' => 'int'
	];

	protected $dates = [
		'addtime'
	];
}
