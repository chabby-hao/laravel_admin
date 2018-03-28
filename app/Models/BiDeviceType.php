<?php

namespace App\Models;

use App\Libs\Helper;

/**
 * App\Models\BiDeviceType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $remark
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeviceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeviceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeviceType whereRemark($value)
 * @mixin \Eloquent
 */
class BiDeviceType extends \App\Models\Base\BiDeviceType
{
	protected $fillable = [
		'name',
		'remark'
	];

    public static function getNameMap()
    {
        $rs = self::orderByDesc('id')->get();
        return Helper::transToKeyValueArray($rs, 'id', 'name');
    }
}
