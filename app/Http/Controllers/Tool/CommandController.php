<?php

namespace App\Http\Controllers\Tool;


use App\Http\Controllers\Controller;
use App\Libs\Helper;
use App\Logics\CommandLogic;
use App\Logics\DeviceLogic;
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


}
