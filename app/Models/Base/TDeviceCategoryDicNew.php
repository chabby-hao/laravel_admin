<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 18:11:24 +0800.
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
 *
 * @package App\Models\Base
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
