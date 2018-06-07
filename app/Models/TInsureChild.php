<?php

namespace App\Models;

/**
 * App\Models\TInsureChild
 *
 * @property string $order_id
 * @property int $order_type
 * @property float $order_money
 * @property string|null $udid
 * @property int $uid
 * @property int $status
 * @property \Carbon\Carbon|null $create_time
 * @property \Carbon\Carbon|null $check_time
 * @property \Carbon\Carbon|null $pay_time
 * @property \Carbon\Carbon|null $issue_time
 * @property string|null $name
 * @property string|null $contact
 * @property string|null $idcard
 * @property string|null $insured
 * @property string|null $idinsured
 * @property string|null $insured_contact
 * @property int $gender
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereCheckTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereIdcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereIdinsured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereInsured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereInsuredContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereIssueTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereOrderMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureChild whereUid($value)
 * @mixin \Eloquent
 */
class TInsureChild extends \App\Models\Base\TInsureChild
{
	protected $fillable = [
		'order_type',
		'order_money',
		'udid',
		'uid',
		'status',
		'create_time',
		'check_time',
		'pay_time',
		'issue_time',
		'name',
		'contact',
		'idcard',
		'insured',
		'idinsured',
		'insured_contact',
		'gender'
	];
}
