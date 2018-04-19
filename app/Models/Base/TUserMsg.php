<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 09:49:12 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TUserMsg
 * 
 * @property int $id
 * @property string $source
 * @property int $reciever
 * @property int $type
 * @property string $desc
 * @property int $state
 * @property int $time
 * @property string $title
 * @property string $extra
 *
 * @package App\Models\Base
 */
class TUserMsg extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_user_msg';
	public $timestamps = false;

	protected $casts = [
		'reciever' => 'int',
		'type' => 'int',
		'state' => 'int',
		'time' => 'int'
	];
}
