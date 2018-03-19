<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 18/3/14
 * Time: 下午3:37
 */

namespace App\Http\Controllers\Admin;


use App\Libs\MyPage;
use App\Models\TDeviceCode;

class DeviceController extends BaseController
{
    public function list()
    {
        $devices = TDeviceCode::join('t_device','qr','=','udid')->orderByDesc('id')->select('t_deivce_code.*,t_deivce.is_lose')->paginate();
        $deviceList = $devices->items();

        foreach ($deviceList as $device){

        }

        return view('admin.device.list', [
            'devices' => $devices,
            'page_nav' => MyPage::showPageNav($devices),
        ]);


    }

}