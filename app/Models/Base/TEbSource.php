<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEbSource
 * 
 * @property int $model_tag
 * @property string $img2x_main
 * @property string $img3x_main
 * @property string $img2x_logo
 * @property string $img3x_logo
 * @property string $new_main
 *
 * @package App\Models\Base
 */
class TEbSource extends Eloquent
{
	protected $connection = 'care';
	protected $primaryKey = 'model_tag';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'model_tag' => 'int'
	];
}
