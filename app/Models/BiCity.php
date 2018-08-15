<?php

namespace App\Models;

/**
 * App\Models\BiCity
 *
 * @property int $id
 * @property string $city
 * @property int $pid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCity whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCity wherePid($value)
 * @mixin \Eloquent
 */
class BiCity extends \App\Models\Base\BiCity
{
	protected $fillable = [
		'id',
		'pid'
	];
}
