<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiScene
 *
 * @property int $id
 * @property string $scenes_name
 * @property string $scenes_remark
 * @property int $customer_id
 * @property int $ev_model
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiScene whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiScene whereEvModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiScene whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiScene whereScenesName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiScene whereScenesRemark($value)
 * @mixin \Eloquent
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
