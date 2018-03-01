<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Feb 2018 03:36:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDeviceCode
 *
 * @property int $sid
 * @property int $type
 * @property string $imei
 * @property string $imsi
 * @property string $phone
 * @property string $qr
 * @property \Carbon\Carbon $register
 * @property int $active
 * @property int $first
 * @property int $ver
 * @property int $rom
 * @property int $model
 * @property \Carbon\Carbon $product_date
 * @property int $product_type
 * @property \Carbon\Carbon $storage_time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereFirst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereProductDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereProductType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereQr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereRom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereStorageTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereVer($value)
 * @mixin \Eloquent
 */
class TDeviceCode extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_device_code';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'active' => 'int',
		'first' => 'int',
		'ver' => 'int',
		'rom' => 'int',
		'model' => 'int',
		'product_type' => 'int'
	];

	protected $dates = [
		'register',
		'product_date',
		'storage_time'
	];

	protected $fillable = [
		'type',
		'imei',
		'imsi',
		'phone',
		'qr',
		'register',
		'active',
		'first',
		'ver',
		'rom',
		'model',
		'product_date',
		'product_type',
		'storage_time'
	];
}
