<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TVerifyCode
 * 
 * @property int $sid
 * @property string $mobile
 * @property string $code
 * @property \Carbon\Carbon $create_tm
 * @property int $type
 * @property int $state
 *
 * @package App\Models\Base
 */
class TVerifyCode extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_verify_code';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'state' => 'int'
	];

	protected $dates = [
		'create_tm'
	];
}
