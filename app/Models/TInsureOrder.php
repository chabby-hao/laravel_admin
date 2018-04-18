<?php

namespace App\Models;

/**
 * App\Models\TInsureOrder
 *
 * @property string $order_id 订单号
 * @property \Carbon\Carbon $create_time 订单创建时间
 * @property string|null $insure_id 保单号，来自于保险公司
 * @property \Carbon\Carbon|null $insure_time 保险公司受理时间
 * @property string $udid 设备号
 * @property string $uid 用户id
 * @property int $insure_type 保险类型1.盗抢险，2.综合险（包含134），3.意外险，4.第三方责任险
 * @property int $status 订单状态，1.已提交未生效，2.已生效，3.已理赔，4.已过期
 * @property string $name 用户姓名
 * @property string $contact 用户手机号
 * @property string|null $address 用户联系地址
 * @property string $idcard 用户身份证号
 * @property string|null $insure_time_length 保险有效时长
 * @property \Carbon\Carbon|null $insure_start 保险生效时间
 * @property \Carbon\Carbon|null $insure_end 保险结束时间
 * @property string|null $active_code 激活码
 * @property string|null $insure_name 保险名称
 * @property string|null $ebike_brand 电动车品牌
 * @property string|null $chassis_id 车架号
 * @property string|null $plate_number 车牌号
 * @property string|null $electromotor_number 电机编号
 * @property string|null $ebike_model 电动车型号
 * @property int $payment_limit 赔付限额
 * @property array $messages_json 请求报文
 * @property int $mode 支付模式，0-非支付，1-支付宝。2-微信,3-苹果内购
 * @property int $is_del 是否注销,0-未注销，1-注销
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereActiveCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereChassisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereEbikeBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereEbikeModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereElectromotorNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereIdcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereInsureEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereInsureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereInsureName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereInsureStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereInsureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereInsureTimeLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereInsureType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereMessagesJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder wherePaymentLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder wherePlateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TInsureOrder whereUid($value)
 * @mixin \Eloquent
 */
class TInsureOrder extends \App\Models\Base\TInsureOrder
{

    const ORDER_STATUS_SUCCESS = 2;//已提交并且生效

	protected $fillable = [
		'create_time',
		'insure_id',
		'insure_time',
		'udid',
		'uid',
		'insure_type',
		'status',
		'name',
		'contact',
		'address',
		'idcard',
		'insure_time_length',
		'insure_start',
		'insure_end',
		'active_code',
		'insure_name',
		'ebike_brand',
		'chassis_id',
		'plate_number',
		'electromotor_number',
		'ebike_model',
		'payment_limit',
		'messages_json',
		'mode',
		'is_del'
	];
}
