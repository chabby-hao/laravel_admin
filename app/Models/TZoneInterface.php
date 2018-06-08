<?php

namespace App\Models;

/**
 * App\Models\TZoneInterface
 *
 * @property int $zid
 * @property float $lat
 * @property float $lng
 * @property int $add_time
 * @property int $radius 半径，米
 * @property int $begin
 * @property int $end
 * @property int $type 1-dewin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneInterface whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneInterface whereBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneInterface whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneInterface whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneInterface whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneInterface whereRadius($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneInterface whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TZoneInterface whereZid($value)
 * @mixin \Eloquent
 */
class TZoneInterface extends \App\Models\Base\TZoneInterface
{
	protected $fillable = [
		'lat',
		'lng',
		'add_time',
		'radius',
		'begin',
		'end',
		'type'
	];
}
