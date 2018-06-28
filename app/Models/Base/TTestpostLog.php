<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TTestpostLog
 *
 * @property int $id
 * @property string $mstsn
 * @property int $cinum
 * @property \Carbon\Carbon $addtime
 * @property string $json_data
 * @property string $imsi
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestpostLog whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestpostLog whereCinum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestpostLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestpostLog whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestpostLog whereJsonData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTestpostLog whereMstsn($value)
 * @mixin \Eloquent
 */
class TTestpostLog extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_testpost_log';
	public $timestamps = false;

	protected $casts = [
		'cinum' => 'int'
	];

	protected $dates = [
		'addtime'
	];
}
