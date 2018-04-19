<?php

namespace App\Models;

/**
 * App\Models\TUserMsg
 *
 * @property int $id
 * @property string|null $source
 * @property int $reciever
 * @property int $type
 * @property string|null $desc
 * @property int $state
 * @property int $time
 * @property string|null $title
 * @property string|null $extra
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereReciever($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TUserMsg whereType($value)
 * @mixin \Eloquent
 */
class TUserMsg extends \App\Models\Base\TUserMsg
{

    const MESSAGE_TYPE_PLATFORM = 0;    //系统消息(系统产生的推送消息
    const MESSAGE_TYPE_INSIDE = 2;    //设备消息(设备进入安全区域
    const MESSAGE_TYPE_MOTOR_LOCK = 7;    //设备消息(电动车锁车通知
    const MESSAGE_TYPE_MOTOR_UNLOCK = 8;    //设备消息(电动车解锁通知
    //const MESSAGE_TYPE_MOTOR_REMIND = 9;    //设备消息(电动车忘记锁车开关通知
    //const MESSAGE_TYPE_MOTOR_FORGET = 10;  //设备消息(电动车忘记锁车通知
    const MESSAGE_TYPE_MOTOR_MILEAGE = 11;  //设备消息(电动车行程结束通知

    const MESSAGE_TYPE_NEW_MOTOR_BATTERY = 1001;//2.1版本之后的电瓶断开
    const MESSAGE_TYPE_NEW_MOTOR_SHAKE = 1002;//2.1版本之后的异常震动
    const MESSAGE_TYPE_NEW_MOTOR_FORGET = 1003;//2.1版本之后的忘记锁车
    const MESSAGE_TYPE_NEW_OUTSIDE = 1004;//2.1版本之后的离开安全区域
    const MESSAGE_TYPE_ROM_UPD = 1005;//2.4固件升级完成
    const MESSAGE_TYPE_LOST_LOCATION_PUSH = 1006;//2.5丢失模式开启,车辆位置更新推送（更新位置10分钟后推一次）
    const MESSAGE_TYPE_LOST_ONLINE_PUSH = 1007;//2.5丢失模式开启,车辆离线后上线的推送
    const MESSAGE_TYPE_LOW_POWER = 1008;//1、	电量低提醒
    const MESSAGE_TYPE_WEATHER_NOTICE = 1010;//天气提醒
    const MESSAGE_TYPE_FAULT_NOTICE = 1011;//故障提醒
    const MESSAGE_TYPE_CARE_NOTICE = 1012;//保养提醒
    const MESSAGE_TYPE_CHARGE_END_WORK_NOTICE = 1009;//充电提醒下班
    const MESSAGE_TYPE_CHARGE_START_WORK_NOTICE = 1013;//充电提醒上班


    public static function getTypeNameMap($type = null)
    {
        $map = [
            self::MESSAGE_TYPE_PLATFORM => '系统消息',
            self::MESSAGE_TYPE_INSIDE => '进入安全区域',
            self::MESSAGE_TYPE_MOTOR_LOCK => '锁车通知',
            self::MESSAGE_TYPE_MOTOR_UNLOCK => '解锁通知',
            //self::MESSAGE_TYPE_MOTOR_REMIND => '忘记锁车',
            self::MESSAGE_TYPE_MOTOR_MILEAGE => '行程结束',
            self::MESSAGE_TYPE_NEW_MOTOR_BATTERY => '电瓶断开',
            self::MESSAGE_TYPE_NEW_MOTOR_SHAKE => '异常震动',
            self::MESSAGE_TYPE_NEW_MOTOR_FORGET => '忘记锁车',
            self::MESSAGE_TYPE_NEW_OUTSIDE => '离开安全区域',
            self::MESSAGE_TYPE_ROM_UPD => '固件升级完成',
            self::MESSAGE_TYPE_LOST_LOCATION_PUSH => '2.5丢失模式开启,车辆位置更新推送（更新位置10分钟后推一次）',
            self::MESSAGE_TYPE_LOST_ONLINE_PUSH => '2.5丢失模式开启,车辆离线后上线的推送',
            self::MESSAGE_TYPE_LOW_POWER => '电量低提醒',
            self::MESSAGE_TYPE_WEATHER_NOTICE => '天气提醒',
            self::MESSAGE_TYPE_FAULT_NOTICE => '故障提醒',
            self::MESSAGE_TYPE_CARE_NOTICE => '保养提醒',
            self::MESSAGE_TYPE_CHARGE_END_WORK_NOTICE => '下班充电提醒',
            self::MESSAGE_TYPE_CHARGE_START_WORK_NOTICE => '上班充电提醒',
        ];
        return $map === null ? $map : $map[$type];
    }

    protected $fillable = [
        'source',
        'reciever',
        'type',
        'desc',
        'state',
        'time',
        'title',
        'extra'
    ];
}
