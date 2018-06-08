<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEbUserOption
 * 
 * @property int $uid
 * @property string $realname
 * @property int $remind
 * @property int $notice
 * @property int $abmove
 * @property int $guard
 * @property int $safezone
 *
 * @package App\Models\Base
 */
class TEbUserOption extends Eloquent
{
	protected $connection = 'care';
	protected $primaryKey = 'uid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'remind' => 'int',
		'notice' => 'int',
		'abmove' => 'int',
		'guard' => 'int',
		'safezone' => 'int'
	];
}
