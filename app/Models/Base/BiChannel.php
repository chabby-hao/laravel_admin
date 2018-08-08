<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Aug 2018 19:43:20 +0800.
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
