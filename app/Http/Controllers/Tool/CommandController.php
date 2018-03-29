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
        list(,$imei) = DeviceLogic::getUdidImei($imei);
        if(CommandLogic::sendCmd($imei, CommandLogic::CMD_REFRESH_GSM)){
            return Helper::response(['time'=>time()]);
        }else{
            return Helper::responeseError();
        }
    }

    //for debug
    public function bt2503(Request $request)
    {
        $imei = $request->input('imei');
        $mac = $request->input('mac');
        $res = false;
        //var_dump($mac);
        //dd($imei, $mac);
        if($imei && $mac){
            RedisLogic::getRedis()->select(6);
            $res = RedisLogic::hSet('pairbt',$mac, $imei);
        }
        if($res){
            return Helper::response();
        }
        return Helper::responeseError();
    }


}
