<?php

namespace App\Models;

/**
 * App\Models\TTestpostLogAll
 *
 * @property int $id
 * @property string $mstsn
 * @property int $cinum
 * @property \Carbon\Carbon $addtime
 * @property string $json_data
 * @property string|null $imsi
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLogAll whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLogAll whereCinum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLogAll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLogAll whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLogAll whereJsonData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TTestpostLogAll whereMstsn($value)
 * @mixin \Eloquent
 */
class TTestpostLogAll extends \App\Models\Base\TTestpostLogAll
{
	protected $fillable = [
		'mstsn',
		'cinum',
		'addtime',
		'json_data',
		'imsi'
	];
}
