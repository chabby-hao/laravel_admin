<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureOrderAppend
 *
 * @property string $atcode
 * @property int $uid
 * @property string $udid
 * @property int $create_time
 * @property int $expire_time
 * @property int $insure_time
 * @property int $status
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrderAppend whereAtcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrderAppend whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrderAppend whereExpireTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrderAppend whereInsureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrderAppend whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrderAppend whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureOrderAppend whereUid($value)
 * @mixin \Eloquent
 */
class TInsureOrderAppend extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_insure_order_append';
	protected $primaryKey = 'atcode';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'create_time' => 'int',
		'expire_time' => 'int',
		'insure_time' => 'int',
		'status' => 'int'
	];
}
