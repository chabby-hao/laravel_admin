<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Aug 2018 10:56:20 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiScene
 * 
 * @property int $id
 * @property string $scenes_name
 * @property string $scenes_remark
 * @property int $customer_id
 * @property int $ev_model
 *
 * @package App\Models\Base
 */
class BiScene extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'ev_model' => 'int'
	];
}
