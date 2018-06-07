<?php

namespace App\Models;

/**
 * App\Models\TBikeFault
 *
 * @property int $id 记录的id号
 * @property string $udid 设备唯一标识
 * @property int $stime 时间戳
 * @property int $ocp 过流保护
 * @property int $hot 过热
 * @property int $high 过压
 * @property int $low 欠压
 * @property int $battery_low 电量不足
 * @property int $block 电机堵转、电机失速
 * @property int $hand_nopower 手把电源没接
 * @property int $hand_earth 手把地线没接
 * @property int $hand_back 手把上电未复位
 * @property int $brake_back 刹把上电未复位
 * @property int $up_bridge 上桥损坏
 * @property int $down_bridge 下桥损坏
 * @property int $hallA_off 霍尔A开路
 * @property int $hallA_short 霍尔A短路
 * @property int $hallB_off 霍尔B开路
 * @property int $hallB_short 霍尔B短路
 * @property int $hallC_off 霍尔C开路
 * @property int $hallC_short 霍尔C短路
 * @property int $hall_value_fail 霍尔真值无效
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereBatteryLow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereBrakeBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereDownBridge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHallAOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHallAShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHallBOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHallBShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHallCOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHallCShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHallValueFail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHandBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHandEarth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHandNopower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHigh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereHot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereLow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereOcp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereStime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBikeFault whereUpBridge($value)
 * @mixin \Eloquent
 */
class TBikeFault extends \App\Models\Base\TBikeFault
{
	protected $fillable = [
		'udid',
		'stime',
		'ocp',
		'hot',
		'high',
		'low',
		'battery_low',
		'block',
		'hand_nopower',
		'hand_earth',
		'hand_back',
		'brake_back',
		'up_bridge',
		'down_bridge',
		'hallA_off',
		'hallA_short',
		'hallB_off',
		'hallB_short',
		'hallC_off',
		'hallC_short',
		'hall_value_fail'
	];
}
