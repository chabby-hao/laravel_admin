<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceConfig
 * 
 * @property int $type_id
 * @property string $name
 * @property string $imgX2
 * @property string $imgX3
 * @property string $imgX2_list
 * @property string $imgX3_list
 * @property string $imgX2_bind
 * @property string $imgX3_bind
 * @property string $imgX2_bindlogo1
 * @property string $imgX3_bindlogo1
 * @property string $imgX2_bindlogo2
 * @property string $imgX3_bindlogo2
 * @property string $models_ignored
 *
 * @package App\Models\Base
 */
class TDeviceConfig extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_config';
	protected $primaryKey = 'type_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'type_id' => 'int'
	];
}
