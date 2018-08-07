<?php

namespace App\Models;
use App\Libs\Helper;

/**
 * App\Models\BiProvince
 *
 * @property int $id
 * @property string|null $province
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiProvince whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiProvince whereProvince($value)
 * @mixin \Eloquent
 */
class BiProvince extends \App\Models\Base\BiProvince
{
	protected $fillable = [
		'province'
	];

	public static function getAllProvinceMap()
    {
        $rs = self::all()->toArray();
        $map = Helper::transToKeyValueArray($rs, 'id', 'province');
        return $map;
    }

}
