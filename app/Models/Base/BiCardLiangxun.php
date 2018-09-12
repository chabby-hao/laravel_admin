<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiCardLiangxun
 *
 * @property int $id
 * @property string $msisdn
 * @property string $iccid
 * @property string $imsi
 * @property string $carrier
 * @property \Carbon\Carbon $expiry_date
 * @property float $data_plan
 * @property float $data_usage
 * @property float $current_date_usage
 * @property string $account_status
 * @property int $active
 * @property \Carbon\Carbon $test_valid_date
 * @property \Carbon\Carbon $silent_valid_date
 * @property float $test_used_data_usage
 * @property \Carbon\Carbon $active_date
 * @property float $data_balance
 * @property \Carbon\Carbon $outbound_date
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereAccountStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereActiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereCarrier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereCurrentDateUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereDataBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereDataPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereDataUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereIccid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereMsisdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereOutboundDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereSilentValidDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereTestUsedDataUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardLiangxun whereTestValidDate($value)
 * @mixin \Eloquent
 */
class BiCardLiangxun extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_card_liangxun';
	public $timestamps = false;

	protected $casts = [
		'data_plan' => 'float',
		'data_usage' => 'float',
		'current_date_usage' => 'float',
		'active' => 'int',
		'test_used_data_usage' => 'float',
		'data_balance' => 'float'
	];

	protected $dates = [
		'expiry_date',
		'test_valid_date',
		'silent_valid_date',
		'active_date',
		'outbound_date'
	];
}
