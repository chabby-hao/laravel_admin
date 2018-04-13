<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Apr 2018 16:11:32 +0800.
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
