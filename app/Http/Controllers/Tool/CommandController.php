<?php

namespace App\Http\Controllers\Tool;


use App\Http\Controllers\Controller;
use App\Libs\Helper;
use App\Logics\CommandLogic;
use App\Logics\DeviceLogic;
use App\Logics\RedisLogic;
use Illuminate\Http\Request;

class CommandController extends Controller
{

    public function refreshGsm(Request $request)
    {
        $imei = $request->input('imei');
        list(, $imei) = DeviceLogic::getUdidImei($imei);
        if (CommandLogic::sendCmd($imei, CommandLogic::CMD_REFRESH_GSM_GPS) &&
            CommandLogic::sendCmd($imei, CommandLogic::CMD_REFRESH_GSM) &&
            CommandLogic::sendCmd($imei, CommandLogic::CMD_REFRESH_GPS)
        ) {
            return Helper::response(['time' => time()]);
        } else {
            return Helper::responeseError();
        }
    }

    //for debug
    public function bt2503(Request $request)
    {
        $imei = $request->input('imei');
        $mac = $request->input('mac');
        $res = false;
        if ($imei && $mac) {
            RedisLogic::getRedis()->select(6);
            $res = RedisLogic::hSet('pairbt', $mac, $imei);
        }
        if ($res) {
            return Helper::response();
        }
        return Helper::responeseError();
    }

    //for debug   关电门后自动设防配置
    public function tongbushefang(Request $request)
    {
        $enable = $request->input('enable');
        $time = $request->input('time');
        $imei = $request->input('imei');
        if ($imei && is_numeric($enable) && $time) {
            CommandLogic::cmdSet($imei, 'AutoFortifyEnable', $enable);
            CommandLogic::cmdSet($imei, 'AutoFortifyTime', $time);
            CommandLogic::sendCmd($imei, CommandLogic::CMD_AUTO_SET_ZDSF);
        }else{
            return Helper::responeseError();
        }
        return Helper::response();
    }

    //for debug 震动分级
    public function zhendongfenji(Request $request)
    {
        $value = $request->input('value');
        $imei = $request->input('imei');
        if ($imei && is_numeric($value)) {
            CommandLogic::cmdSet($imei, 'ShakeSignalValue', $value);
            CommandLogic::sendCmd($imei, CommandLogic::CMD_AUTO_SET_ZDFJ);
        }else{
            return Helper::responeseError();
        }
        return Helper::response();
    }

    //for debug 激活配置
    public function activeConfig(Request $request)
    {
        $value = $request->input('value');
        $imei = $request->input('imei');
        if ($imei && is_numeric($value)) {
            CommandLogic::cmdSet($imei, 'ActivatedState', $value);
            CommandLogic::sendCmd($imei, CommandLogic::CMD_ACTIVE_CONFIG);
        }else{
            return Helper::responeseError();
        }
        return Helper::response();
    }

    //for debug   神舟飞箭设置档位
    public function szfjGear(Request $request)
    {
        $value = $request->input('value');
        $imei = $request->input('imei');
        if ($imei && is_numeric($value)) {
            CommandLogic::cmdSet($imei, 'szfj_gear', $value);
            CommandLogic::sendCmd($imei, CommandLogic::CMD_ACTIVE_CONFIG);
        }else{
            return Helper::responeseError();
        }
        return Helper::response();
    }

    //for debug 发命令
    public function command(Request $request)
    {
        $cmd = $request->input('cmd');
        $imei = $request->input('imei');
        if ($imei && $cmd) {
            CommandLogic::sendCmd($imei, $cmd);
        }else{
            return Helper::responeseError();
        }
        return Helper::response();
    }

    public function cmdSet(Request $request)
    {

        if(env('APP_ENV') !== 'test'){
            //die('非法操作');
        }

        if($data = Helper::arrayRequiredCheck(['imei','field','value'], $request->input())){
            CommandLogic::cmdSet($data['imei'], $data['field'], $data['value']);
            return Helper::response();
        }
    }

}
