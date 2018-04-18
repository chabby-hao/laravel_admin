<?php

namespace App\Models;
use App\Libs\Helper;

/**
 * App\Models\TInsureType
 *
 * @property int $id 保险ID
 * @property string $name 保险名称
 * @property string $provider 保险提供者
 * @property int $max_compensation
 * @property int $time_length
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureType whereMaxCompensation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureType whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureType whereTimeLength($value)
 * @mixin \Eloquent
 */
class TInsureType extends \App\Models\Base\TInsureType
{
	protected $fillable = [
		'name',
		'provider',
		'max_compensation',
		'time_length'
	];

    public static function getNameMap()
    {
        $rs = self::orderByDesc('id')->get();
        return Helper::transToKeyValueArray($rs, 'id', 'name');
    }

}
