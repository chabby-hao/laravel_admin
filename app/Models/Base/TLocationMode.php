<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TLocationMode
 *
 * @property int $id
 * @property int $interval
 * @property string $title
 * @property string $state
 * @property string $tip
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLocationMode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLocationMode whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLocationMode whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLocationMode whereTip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TLocationMode whereTitle($value)
 * @mixin \Eloquent
 */
class TLocationMode extends Eloquent
{
	protected $connection = 'care';
	public $timestamps = false;

	protected $casts = [
		'interval' => 'int'
	];
}
