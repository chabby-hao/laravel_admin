<?php

namespace App\Http\Controllers\Tool;


use App\Http\Controllers\Controller;
use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Logics\RedisLogic;
use App\Objects\CommandObject;
use Illuminate\Http\Request;

class CommandController extends Controller
{

    public function refreshGsm(Request $request)
    {
        $imei = $request->input('imei');
        list(,$imei) = DeviceLogic::getUdidImei($imei);
        if(RedisLogic::sendCmd($imei, CommandObject::CMD_REFRESH_GSM)){
            return Helper::response(['time'=>time()]);
        }else{
            return Helper::responeseError();
        }
    }


}
