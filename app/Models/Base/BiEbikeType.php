<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 16:52:59 +0800.
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
