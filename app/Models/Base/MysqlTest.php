<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MysqlTest
 * 
 * @property int $id
 * @property string $udid
 *
 * @package App\Models\Base
 */
class MysqlTest extends Eloquent
{
	protected $connection = 'care';
	protected $table = 'mysql_test';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];
}
