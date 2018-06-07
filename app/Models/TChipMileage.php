<?php

namespace App\Models;

/**
 * App\Models\TChipMileage
 *
 * @property int $id
 * @property int $last_mile 上次仪表盘里程
 * @property int $history_mile 历史智慧芯总里程
 * @property int $add_time
 * @property int $update_time
 * @property string $udid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TChipMileage whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TChipMileage whereHistoryMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TChipMileage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TChipMileage whereLastMile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TChipMileage whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TChipMileage whereUpdateTime($value)
 * @mixin \Eloquent
 */
class TChipMileage extends \App\Models\Base\TChipMileage
{
	protected $fillable = [
		'last_mile',
		'history_mile',
		'add_time',
		'update_time',
		'udid'
	];
}
