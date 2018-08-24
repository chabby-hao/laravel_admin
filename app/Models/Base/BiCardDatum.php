<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:36:39 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiCardDatum
 * 
 * @property int $id
 * @property string $msisdn
 * @property string $imsi
 * @property \Carbon\Carbon $date
 * @property float $data_usage
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiCardDatum extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'data_usage' => 'float'
	];

	protected $dates = [
		'date'
	];
}
