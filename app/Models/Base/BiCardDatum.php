<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardDatum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardDatum whereDataUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardDatum whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardDatum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardDatum whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardDatum whereMsisdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCardDatum whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiCardDatum extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'data_usage' => 'float'
	];
}
