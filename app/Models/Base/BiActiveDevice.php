<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiActiveDevice
 *
 * @property int $id
 * @property string $date
 * @property int $total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveDevice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveDevice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiActiveDevice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiActiveDevice extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'total' => 'int'
	];
}
