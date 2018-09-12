<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiBreakRule
 *
 * @property int $id
 * @property string $lpn
 * @property string $car_username
 * @property string $car_phone
 * @property string $car_factory
 * @property int $violation_type
 * @property \Carbon\Carbon $violation_time
 * @property string $violation_location
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereCarFactory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereCarPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereCarUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereLpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereViolationLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereViolationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiBreakRule whereViolationType($value)
 * @mixin \Eloquent
 */
class BiBreakRule extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'violation_type' => 'int'
	];

	protected $dates = [
		'violation_time'
	];
}
