<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Mar 2018 18:09:31 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TEvMileageGp
 * 
 * @property string $udid
 * @property int $begin
 * @property int $end
 * @property int $duration
 * @property float $mile
 * @property int $power
 * @property string $points
 * @property int $mid
 *
 * @package App\Models\Base
 */
class TEvMileageGp extends Eloquent
{
	protected $connection = 'care';
	protected $primaryKey = 'mid';
	public $timestamps = false;

	protected $casts = [
		'begin' => 'int',
		'end' => 'int',
		'duration' => 'int',
		'mile' => 'float',
		'power' => 'int'
	];
}
