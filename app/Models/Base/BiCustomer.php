<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Aug 2018 20:07:31 +0800.
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
