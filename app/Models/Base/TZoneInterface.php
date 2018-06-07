<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TZoneInterface
 * 
 * @property int $zid
 * @property float $lat
 * @property float $lng
 * @property int $add_time
 * @property int $radius
 * @property int $begin
 * @property int $end
 * @property int $type
 *
 * @package App\Models\Base
 */
class TZoneInterface extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_zone_interface';
	protected $primaryKey = 'zid';
	public $timestamps = false;

	protected $casts = [
		'lat' => 'float',
		'lng' => 'float',
		'add_time' => 'int',
		'radius' => 'int',
		'begin' => 'int',
		'end' => 'int',
		'type' => 'int'
	];
}
