<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Mar 2018 18:09:31 +0800.
 */

namespace App\Models\Base;

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
 * @property int $ebike_type_id
 * @property int $channel_id
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereEbikeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereFirst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereProductDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereProductType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereQr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereRom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereStorageTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TDeviceCode whereVer($value)
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
		'product_type' => 'int',
		'ebike_type_id' => 'int',
		'channel_id' => 'int'
	];

	protected $dates = [
		'register',
		'product_date',
		'storage_time'
	];
}
