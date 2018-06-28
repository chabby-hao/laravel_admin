<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 May 2018 17:25:41 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiEbikeType
 *
 * @property int $id
 * @property string $ebike_name
 * @property string $ebike_remark
 * @property int $brand_id
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiEbikeType whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiEbikeType whereEbikeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiEbikeType whereEbikeRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiEbikeType whereId($value)
 * @mixin \Eloquent
 * @property string|null $ev_model 兼容旧表
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiEbikeType whereEvModel($value)
 */
class BiEbikeType extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_ebike_type';
	public $timestamps = false;

	protected $casts = [
		'brand_id' => 'int'
	];
}
