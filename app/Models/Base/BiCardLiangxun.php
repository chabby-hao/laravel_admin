<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 27 Aug 2018 16:44:42 +0800.
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
 *
 * @package App\Models\Base
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
