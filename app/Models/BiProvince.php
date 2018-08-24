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
 * @property string|null $short_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiProvince whereShortName($value)
 */
class BiProvince extends \App\Models\Base\BiProvince
{
	protected $fillable = [
		'province',
        'short_name',
	];

	public static function getAllProvinceMap($short = false)
    {
        $name = $short ? 'short_name' : 'province';
        $rs = self::all()->toArray();
        $map = Helper::transToKeyValueArray($rs, 'id', $name);
        return $map;
    }

}
