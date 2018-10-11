<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Oct 2018 16:13:45 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiCardDatum
 * 
 * @property int $id
 * @property string $msisdn
 * @property string $imsi
 * @property string $date
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
}
