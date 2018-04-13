<?php

namespace App\Objects;

class FaultObject extends BaseObject
{

    const EV_MESSAGE_POWER_SYSTEM_CONTROL = 100001;             //控制器通讯故障
    const EV_MESSAGE_POWER_SYSTEM_CRUISE = 100002;             //巡航故障
    const EV_MESSAGE_POWER_SYSTEM_HALL = 100003;             //HALL故障
    const EV_MESSAGE_POWER_SYSTEM_BLOCK = 100004;             //堵转
    const EV_MESSAGE_POWER_SYSTEM_DRIVER = 100005;             //驱动电源故障
    const EV_MESSAGE_POWER_SYSTEM_HIGH = 100006;             //过压
    const EV_MESSAGE_POWER_SYSTEM_LOW = 100007;             //欠压
    const EV_MESSAGE_POWER_SYSTEM_HOT = 100008;             //控制器过温
    const EV_MESSAGE_POWER_SYSTEM_SWITCH = 100009;             //转把故障
    const EV_MESSAGE_POWER_SYSTEM_PHASE = 100010;             //缺相
    const EV_MESSAGE_POWER_SYSTEM_TEMPLE_SWITCH = 100011;             //边撑开关有效
    const EV_MESSAGE_POWER_SYSTEM_EBS = 100012;             //EBS状态
    const EV_MESSAGE_POWER_SYSTEM_BRAKE = 100013;             //刹车断电状态
    const EV_MESSAGE_POWER_SYSTEM_LOCK = 100014;             //锁车状态
    const EV_MESSAGE_POWER_SYSTEM_BATLOCK = 100015;             //速度锁车状态
    const EV_MESSAGE_POWER_SYSTEM_DRIVERCHECK = 100016;             //驱动器校检失败
    const EV_MESSAGE_POWER_SYSTEM_OVERFLOWING = 100017;             //过流
    const EV_MESSAGE_POWER_SYSTEM_POWERTUBE = 100018;             //功率管故障

    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_CHARGE = 101001;              //正常充电
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_DISCHARGE = 101002;              //正常放电
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_SATURATION = 101003;              //充电饱和保护
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_EXHAUST = 101004;              //电池耗尽保护
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_CHARGE_OVERFLOWING = 101005;   //充电过流保护
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_DISCHARGE_OVERFLOWING = 101006;   //放电过流保护
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_BATTERY1 = 101007;              //电池其他异常1
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_BATTERY2 = 101008;              //电池其他异常2
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_BATTERY3 = 101009;              //电池其他异常3
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_BATTERY4 = 101010;              //电池其他异常4
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_TOOHOT = 101011;              //电池过热保护
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_TOOCOLD = 101012;              //电池过冷保护
    //新增电瓶障
    const EV_MESSAGE_POWER_SUPPLY_SYSTEM_CHARGE_FAIL = 101013;             //电瓶故障


    const EV_MESSAGE_DISPLAY_SYSTEM = 102;
    const EV_MESSAGE_DISPLAY_SYSTEM_BMS = 102001;             //BMS通讯故障
    const EV_MESSAGE_DISPLAY_SYSTEM_INSTRUMENT = 102002;             //仪表通讯故障
    const EV_MESSAGE_DISPLAY_SYSTEM_TRUNK = 102003;             //通讯总线故障

    //中控系统GPS故障，定位方式．
    const EV_MESSAGE_CONTROLLER_SYSTEM_GPS = 103001;             //GPS故障
    const EV_MESSAGE_CONTROLLER_SYSTEM_LOCATION = 103002;             //定位方式


    //电动车故障项枚举，值=1为有异常
    static $keyMap = array(
        'control' => self::EV_MESSAGE_POWER_SYSTEM_CONTROL,                            //控制器通讯故障
        //'cruise' => self::EV_MESSAGE_POWER_SYSTEM_CRUISE,                              //巡航故障
        'hall' => self::EV_MESSAGE_POWER_SYSTEM_HALL,                                  //HALL故障
        'block' => self::EV_MESSAGE_POWER_SYSTEM_BLOCK,                                //堵转
        'powerDriver' => self::EV_MESSAGE_POWER_SYSTEM_DRIVER,                         //驱动电源故障
        'high' => self::EV_MESSAGE_POWER_SYSTEM_HIGH,                                  //过压
        'low' => self::EV_MESSAGE_POWER_SYSTEM_LOW,                                    //欠压
        'hot' => self::EV_MESSAGE_POWER_SYSTEM_HOT,                                    //控制器过温
        'switch' => self::EV_MESSAGE_POWER_SYSTEM_SWITCH,                              //转把故障
        'phase' => self::EV_MESSAGE_POWER_SYSTEM_PHASE,                                //缺相
        'templeSwitch' => self::EV_MESSAGE_POWER_SYSTEM_TEMPLE_SWITCH,                 //边撑开关有效
        'ebs' => self::EV_MESSAGE_POWER_SYSTEM_EBS,                                    //EBS状态
        'isBrake' => self::EV_MESSAGE_POWER_SYSTEM_BRAKE,                              //刹车断电状态
        //'lock' => self::EV_MESSAGE_POWER_SYSTEM_LOCK,                                //锁车状态
        'batLock' => self::EV_MESSAGE_POWER_SYSTEM_BATLOCK,                            //速度锁车状态
        'driverCheck' => self::EV_MESSAGE_POWER_SYSTEM_DRIVERCHECK,                    //驱动器校检失败
        'overflowing' => self::EV_MESSAGE_POWER_SYSTEM_OVERFLOWING,                    //过流
        'powerTube' => self::EV_MESSAGE_POWER_SYSTEM_POWERTUBE,                        //功率管故障

        //供电
        //'charge' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_CHARGE,
        'discharge' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_DISCHARGE,
        'saturation' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_SATURATION,
        'exhaust' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_EXHAUST,

        /*
        'chargeOverFlowing' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_CHARGE_OVERFLOWING,
        'dischargeOverFlowing' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_DISCHARGE_OVERFLOWING,
        'battery1' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_BATTERY1,
        'battery2' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_BATTERY2,
        'battery3' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_BATTERY3,
        'battery4' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_BATTERY4,
        'tooHot' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_TOOHOT,
        'tooCold' => self::EV_MESSAGE_POWER_SUPPLY_SYSTEM_TOOCOLD,
        */

        //显示系统
        /*
        'bms' => self::EV_MESSAGE_DISPLAY_SYSTEM_BMS,
        'instrument' => self::EV_MESSAGE_DISPLAY_SYSTEM_INSTRUMENT,
        'trunk' => self::EV_MESSAGE_DISPLAY_SYSTEM_TRUNK,
        */

        //中控系统
        /*
        'gps' => self::EV_MESSAGE_CONTROLLER_SYSTEM_GPS,
        'location' => self::EV_MESSAGE_CONTROLLER_SYSTEM_LOCATION
        */
    );

}