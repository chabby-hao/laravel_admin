<?php

namespace App\Models;

/**
 * App\Models\BiBrand
 *
 * @property int $id
 * @property string|null $brand_name 品牌名
 * @property string|null $brand_remark
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBrand whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBrand whereBrandRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBrand whereId($value)
 * @mixin \Eloquent
 */
class BiBrand extends \App\Models\Base\BiBrand
{
	protected $fillable = [
		'brand_name',
		'brand_remark',
        'id',
	];
}
