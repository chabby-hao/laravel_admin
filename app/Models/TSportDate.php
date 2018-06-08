<?php

namespace App\Models;

/**
 * App\Models\TSportDate
 *
 * @property string $udid
 * @property int $year
 * @property int $month
 * @property int $days
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSportDate whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSportDate whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSportDate whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TSportDate whereYear($value)
 * @mixin \Eloquent
 */
class TSportDate extends \App\Models\Base\TSportDate
{
	protected $fillable = [
		'days'
	];
}
