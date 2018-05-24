<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 May 2018 15:35:38 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceCategoryDicNew
 *
 * @property int $record_id
 * @property int $products
 * @property string $model
 * @property int $channel
 * @property int $type
 * @property int $brand
 * @property int $ev_model
 * @property int $level
 * @property string $name
 * @property string $remark
 * @property int $rank
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereEvModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCategoryDicNew whereType($value)
 * @mixin \Eloquent
 */
class TDeviceCategoryDicNew extends Eloquent
{
	protected $connection = 'care_operate';
	protected $table = 't_device_category_dic_new';
	protected $primaryKey = 'record_id';
	public $timestamps = false;

	protected $casts = [
		'products' => 'int',
		'channel' => 'int',
		'type' => 'int',
		'brand' => 'int',
		'ev_model' => 'int',
		'level' => 'int',
		'rank' => 'int'
	];
}
