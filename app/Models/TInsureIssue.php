<?php

namespace App\Models;

/**
 * App\Models\TInsureIssue
 *
 * @property string $order_id
 * @property string|null $policy_id
 * @property \Carbon\Carbon|null $policy_start
 * @property \Carbon\Carbon|null $policy_end
 * @property \Carbon\Carbon|null $fee_date
 * @property string|null $contract_url
 * @property float $premium
 * @property float $suminsured
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureIssue whereContractUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureIssue whereFeeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureIssue whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureIssue wherePolicyEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureIssue wherePolicyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureIssue wherePolicyStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureIssue wherePremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureIssue whereSuminsured($value)
 * @mixin \Eloquent
 */
class TInsureIssue extends \App\Models\Base\TInsureIssue
{
	protected $fillable = [
		'policy_id',
		'policy_start',
		'policy_end',
		'fee_date',
		'contract_url',
		'premium',
		'suminsured'
	];
}
