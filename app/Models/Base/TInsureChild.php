<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureChild
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
 * @property string $insured
 * @property string $idinsured
 * @property string $insured_contact
 * @property int $gender
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereCheckTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereIdcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereIdinsured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereInsured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereInsuredContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereIssueTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereOrderMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureChild whereUid($value)
 * @mixin \Eloquent
 */
class TInsureChild extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_insure_child';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_type' => 'int',
		'order_money' => 'float',
		'uid' => 'int',
		'status' => 'int',
		'gender' => 'int'
	];

	protected $dates = [
		'create_time',
		'check_time',
		'pay_time',
		'issue_time'
	];
}
