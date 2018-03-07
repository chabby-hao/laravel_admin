<?php

namespace App\Models;

/**
 * App\Models\BiEbikeType
 *
 * @property int $id
 * @property string|null $ebike_name 车型名称
 * @property string|null $ebike_remark 备注
 * @property int $brand_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiEbikeType whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiEbikeType whereEbikeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiEbikeType whereEbikeRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiEbikeType whereId($value)
 * @mixin \Eloquent
 * @property int $ev_model
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiEbikeType whereEvModel($value)
 */
class BiEbikeType extends \App\Models\Base\BiEbikeType
{
	protected $fillable = [
		'ebike_name',
		'ebike_remark',
		'brand_id',
        'id',
        'ev_model',
	];
}
