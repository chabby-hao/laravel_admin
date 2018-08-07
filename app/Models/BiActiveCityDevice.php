<?php

namespace App\Models;

/**
 * App\Models\BiActiveCityDevice
 *
 * @property int $id
 * @property int $pid
 * @property string|null $date
 * @property int $total
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveCityDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveCityDevice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveCityDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveCityDevice wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveCityDevice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveCityDevice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiActiveCityDevice extends \App\Models\Base\BiActiveCityDevice
{
	protected $fillable = [
		'pid',
		'date',
		'total'
	];
}
