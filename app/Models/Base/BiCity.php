<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiCity
 *
 * @property int $id
 * @property string $city
 * @property int $pid
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCity whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiCity wherePid($value)
 * @mixin \Eloquent
 */
class BiCity extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_city';
	protected $primaryKey = 'id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'pid' => 'int'
	];
}
