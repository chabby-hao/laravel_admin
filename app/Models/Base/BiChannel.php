<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Mar 2018 18:26:39 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiChannel
 *
 * @property int $id
 * @property string $channel_name
 * @property string $channel_remark
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannel whereChannelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannel whereChannelRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiChannel whereId($value)
 * @mixin \Eloquent
 */
class BiChannel extends Eloquent
{
	protected $connection = 'bi';
	public $timestamps = false;
}