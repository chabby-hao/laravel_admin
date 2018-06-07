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
 *
 * @package App\Models\Base
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
