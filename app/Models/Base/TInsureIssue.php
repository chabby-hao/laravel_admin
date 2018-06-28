<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TInsureIssue
 *
 * @property string $order_id
 * @property string $policy_id
 * @property \Carbon\Carbon $policy_start
 * @property \Carbon\Carbon $policy_end
 * @property \Carbon\Carbon $fee_date
 * @property string $contract_url
 * @property float $premium
 * @property float $suminsured
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureIssue whereContractUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureIssue whereFeeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureIssue whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureIssue wherePolicyEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureIssue wherePolicyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureIssue wherePolicyStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureIssue wherePremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TInsureIssue whereSuminsured($value)
 * @mixin \Eloquent
 */
class TInsureIssue extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_insure_issue';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'premium' => 'float',
		'suminsured' => 'float'
	];

	protected $dates = [
		'policy_start',
		'policy_end',
		'fee_date'
	];
}
