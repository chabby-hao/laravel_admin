<?php

namespace App\Models;

/**
 * App\Models\TInsureEv
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
 * @property string|null $idchassis
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereCheckTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereIdcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereIdchassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereIssueTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereOrderMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureEv whereUid($value)
 * @mixin \Eloquent
 */
class TInsureEv extends \App\Models\Base\TInsureEv
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
		'idchassis',
		'brand',
		'model',
		'price'
	];
}
