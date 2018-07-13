<?php

namespace App\Models;
use App\Libs\Helper;
use App\Objects\DeviceObject;
use Illuminate\Support\Facades\Cache;

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
 * @property int $mcu
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereMcu($value)
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
 * @property int|null $device_type 设备型号
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereDeviceType($value)
 * @property bool|null $device_cycle 设备周期
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCode whereDeviceCycle($value)
 */
class TDeviceCode extends \App\Models\Base\TDeviceCode
{

    const DEVICE_CYCLE_ALL = 0;//全部,也可表示初始化init
    const DEVICE_CYCLE_STORAGE = 1;//库存
    const DEVICE_CYCLE_CHANNEL_STORAGE = 2;//渠道库存
    const DEVICE_CYCLE_INUSE = 3;//使用中
    const DEVICE_CYCLE_LOST = 4;//丢失
    const DEVICE_CYCLE_SCRAP = 5;//报废
    const DEVICE_CYCLE_CHANNEL_EXPIRE = 6;//渠道过期
    const DEVICE_CYCLE_REFURBISHMENT_CHANNEL = 7;//翻新渠道
    const DEVICE_CYCLE_REFURBISHMENT_USER = 8;//翻新用户
    const DEVICE_CYCLE_USE_EXPIRE = 9;//使用过期

    public static function getCycleMap($type = null)
    {
        $map = [
            self::DEVICE_CYCLE_ALL => '全部',
            self::DEVICE_CYCLE_STORAGE => '库存',
            self::DEVICE_CYCLE_CHANNEL_STORAGE => '渠道库存',
            self::DEVICE_CYCLE_INUSE => '使用中',
            self::DEVICE_CYCLE_LOST => '丢失',
            self::DEVICE_CYCLE_SCRAP => '报废',
            self::DEVICE_CYCLE_CHANNEL_EXPIRE => '渠道过期',
            self::DEVICE_CYCLE_REFURBISHMENT_CHANNEL => '翻新渠道',
            self::DEVICE_CYCLE_REFURBISHMENT_USER => '翻新用户',
            self::DEVICE_CYCLE_USE_EXPIRE => '使用过期',
        ];
        return $type === null ? $map : $map[$type];
    }

    /**
     * 获取渠道登录下的周期map
     */
    public static function getChannelCycleMap()
    {
        $map = [
            self::DEVICE_CYCLE_ALL => '全部',
            self::DEVICE_CYCLE_CHANNEL_STORAGE => '渠道库存',
            self::DEVICE_CYCLE_INUSE => '使用中',
            self::DEVICE_CYCLE_LOST => '丢失',
            self::DEVICE_CYCLE_SCRAP => '报废',
            self::DEVICE_CYCLE_CHANNEL_EXPIRE => '渠道过期',
            //self::DEVICE_CYCLE_REFURBISHMENT_CHANNEL => '翻新渠道',//在报废下面
            //self::DEVICE_CYCLE_REFURBISHMENT_USER => '翻新用户',//在报废下面
            self::DEVICE_CYCLE_USE_EXPIRE => '使用过期',
        ];
        return $map;
    }

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
        'channel_id',
        'brand_id',
        'device_type',
        'delivered_at',
        'is_lost',
        'device_cycle',
	];

    public static function getByUdid($udid)
    {
        return self::whereQr($udid)->first();
    }

    public static function getDeviceModelHasType()
    {
        $types = TDeviceCategoryDicNew::whereLevel(5)->whereProducts(6)->get()->toArray();
        $types = Helper::transToOneDimensionalArray($types, 'type');
        $model = TDeviceCode::whereIn('type', $types);
        return $model;
    }

    /**
     * @return $this
     */
    public static function getDeviceModel()
    {
        $types = TDeviceCategoryDicNew::whereLevel(5)->whereProducts(6)->get()->toArray();
        $types = Helper::transToOneDimensionalArray($types, 'type');
        $model = TDeviceCode::where('device_cycle','>', self::DEVICE_CYCLE_ALL);
        $model->whereIn('t_device_code.type', $types);
        return $model;
    }

}
