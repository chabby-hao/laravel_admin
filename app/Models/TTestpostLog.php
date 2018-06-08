<?php

namespace App\Models;

/**
 * App\Models\TTestpostLog
 *
 * @property int $id
 * @property string $mstsn
 * @property int $cinum
 * @property \Carbon\Carbon $addtime
 * @property string $json_data
 * @property string|null $imsi
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLog whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLog whereCinum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLog whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLog whereJsonData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLog whereMstsn($value)
 * @mixin \Eloquent
 */
class TTestpostLog extends \App\Models\Base\TTestpostLog
{
	protected $fillable = [
		'mstsn',
		'cinum',
		'addtime',
		'json_data',
		'imsi'
	];
}
