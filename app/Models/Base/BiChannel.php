<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 16:51:04 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiChannel
 * 
 * @property int $id
 * @property string $channel_name
 * @property string $channel_remark
 *
 * @package App\Models\Base
 */
class BiChannel extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;
}
