<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureEv
 *
 * @property string $order_id
 * @property int $order_type
 * @property float $order_money
 * @property string $udid
 * @property int $uid
 * @property int $status
 * @property \Carbon\Carbon $create_time
 * @property \Carbon\Carbon $check_time
 * @property \Carbon\Carbon $pay_time
 * @property \Carbon\Carbon $issue_time
 * @property string $name
 * @property string $contact
 * @property string $idcard
 * @property string $idchassis
 * @property string $brand
 * @property string $model
 * @property string $price
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereCheckTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereIdcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereIdchassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereIssueTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereOrderMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureEv whereUid($value)
 * @mixin \Eloquent
 */
class TInsureEv extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_insure_ev';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_type' => 'int',
		'order_money' => 'float',
		'uid' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'create_time',
		'check_time',
		'pay_time',
		'issue_time'
	];
}
