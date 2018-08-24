<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:36:39 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiCustomer
 * 
 * @property int $id
 * @property int $channel_id
 * @property string $customer_name
 * @property string $customer_remark
 *
 * @package App\Models\Base
 */
class BiCustomer extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;

	protected $casts = [
		'channel_id' => 'int'
	];
}
