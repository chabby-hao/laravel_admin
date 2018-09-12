<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Sep 2018 16:14:56 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiProvince
 *
 * @property int $id
 * @property string $province
 * @property string $short_name
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiProvince whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiProvince whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\BiProvince whereShortName($value)
 * @mixin \Eloquent
 */
class BiProvince extends Eloquent
{
	protected $connection = 'bi';
	protected $table = 'bi_province';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];
}
