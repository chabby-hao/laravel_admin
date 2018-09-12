<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
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
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCustomer whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCustomer whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCustomer whereCustomerRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCustomer whereId($value)
 * @mixin \Eloquent
 */
class BiCustomer extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;

	protected $casts = [
		'channel_id' => 'int'
	];
}
