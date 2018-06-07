<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDewinUrl
 * 
 * @property int $id
 * @property string $udid
 * @property string $url
 * @property int $addtime
 *
 * @package App\Models\Base
 */
class TDewinUrl extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_dewin_url';
	public $timestamps = false;

	protected $casts = [
		'addtime' => 'int'
	];
}
