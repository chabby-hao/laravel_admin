<?php

namespace App\Models;

/**
 * App\Models\TDeviceCode
 *
 * @property int $sid
 * @property int $type
 * @property string|null $imei
 * @property string|null $imsi
 * @property string|null $phone
 * @property string|null $qr
 * @property \Carbon\Carbon|null $register
 * @property int $active
 * @property int $first
 * @property int $ver
 * @property int $rom
 * @property int $model 0=>未知设备类型，1=eb001,2=eb001b,3=eb001c,4=eb001a,5=eb001d,7=B640,91=童鞋，92=手环，93=老人拐杖，99=测试
 * @property \Carbon\Carbon|null $product_date 生产时间
 * @property int $product_type 生产类型 1量产 2试产
 * @property \Carbon\Carbon|null $storage_time 入库时间
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
 * @property int $ebike_type_id 车型Id
 * @property int $channel_id 渠道id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereEbikeTypeId($value)
 * @property int|null $brand_id 品牌id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereBrandId($value)
 * @property string|null $delivered_at 出货时间
 * @property bool|null $is_lost 是否丢失，0=未丢失，1=丢失
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereIsLost($value)
 */
class TDeviceCode extends \App\Models\Base\TDeviceCode
{
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
		'storage_time',
        'ebike_type_id',
        'channel_id'
	];

    public static function getByUdid($udid)
    {
        return self::whereQr($udid)->first();
    }

    public static function getDeviceModel()
    {
        $brandis = BiBrand::getAllBrandIds();
        return TDeviceCode::whereIn('type', $brandis);
    }

}
