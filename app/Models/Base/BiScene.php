<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Aug 2018 14:28:34 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiScene
 * 
 * @property int $id
 * @property string $ebike_name
 * @property string $ebike_remark
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
