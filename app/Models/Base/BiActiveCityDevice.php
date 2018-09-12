<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiActiveCityDevice
 *
 * @property int $id
 * @property int $pid
 * @property string $date
 * @property string $udid
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveCityDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveCityDevice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveCityDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveCityDevice wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveCityDevice whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveCityDevice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiActiveCityDevice extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'pid' => 'int'
	];
}
