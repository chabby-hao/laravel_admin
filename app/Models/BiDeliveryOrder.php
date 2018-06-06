<?php

namespace App\Models;

/**
 * App\Models\BiDeliveryOrder
 *
 * @property int $id
 * @property int $user_id
 * @property int $state 状态，0=代工厂处理，1=已完成，2=已作废
 * @property int $ship_no 出货单号
 * @property int $order_id
 * @property string|null $part_number 料号
 * @property int $fact_id 工厂id（其实就是user_id）
 * @property \Carbon\Carbon|null $delivery_date 出货日期
 * @property int $delivery_quantity 出货数量
 * @property int $brand_id 品牌id
 * @property int $ebike_type_id 车型id
 * @property int $battery_type 电池型号
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereDeliveryQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereEbikeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereFactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder wherePartNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereShipNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $actuall_date 实际出货日期
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiDeliveryOrder whereActuallDate($value)
 */
class BiDeliveryOrder extends \App\Models\Base\BiDeliveryOrder
{
	protected $fillable = [
		'user_id',
		'state',
		'ship_no',
		'order_id',
		'part_number',
		'fact_id',
		'delivery_date',
		'delivery_quantity',
		'brand_id',
		'ebike_type_id',
        'battery_type',
	];

	protected $dates = [];

    const DELIVERY_ORDER_STATE_INIT = 0;//待工厂处理
    const DELIVERY_ORDER_STATE_FINISH = 1;//已完成
    const DELIVERY_ORDER_STATE_CANCEL = 2;//已作废

    const BATTERY_TYPE_XINPU = 1;//新普
    const BATTERY_TYPE_AIBIKE = 2;//艾比克
    const BATTERY_TYPE_ZHONGLI = 3;//中锂
    const BATTERY_TYPE_HUIKANG = 4;//惠康锂电

    public static function getBatteryTypeMap()
    {
        $map = [
            self::BATTERY_TYPE_XINPU => '新普',
            self::BATTERY_TYPE_AIBIKE => '艾比克',
            self::BATTERY_TYPE_ZHONGLI => '中锂',
            self::BATTERY_TYPE_HUIKANG => '惠康',
        ];
        return $map;
    }


    public static function getStateTypeName($type = null)
    {
        $map = [
            self::DELIVERY_ORDER_STATE_INIT =>'待工厂处理',
            self::DELIVERY_ORDER_STATE_FINISH =>'已完成',
            self::DELIVERY_ORDER_STATE_CANCEL =>'已作废',
        ];
        return $type === null ? $map : $map[$type];
    }


}
