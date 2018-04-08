<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 18/3/14
 * Time: 下午3:37
 */

namespace App\Http\Controllers\Admin;


use App\Libs\MyPage;
use App\Logics\DeviceLogic;
use App\Models\BiBrand;
use App\Models\TDevice;
use App\Models\TDeviceCode;

class DeviceController extends BaseController
{
    /**
     * 缓存策略：按照ID缓存,in(1,2,3,4)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $devices = TDeviceCode::getDeviceModel()->orderByDesc('sid')->select('t_device_code.*')->paginate();
        $deviceList = $devices->items();

        $data = [];

        /** @var TDevice $device */
        foreach ($deviceList as $device){
            $data[] = DeviceLogic::createDevice($device->imei);
        }

        return view('admin.device.list', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($devices),
        ]);


    }

}