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
use App\Logics\OrderLogic;
use App\Models\BiBrand;
use App\Models\BiEbikeType;
use App\Models\BiOrder;
use App\Models\TDevice;
use App\Models\TDeviceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class MapController extends BaseController
{
    public function show(Request $request)
    {
        if($request->isXmlHttpRequest()){
            //请求数据
        }

        return view('admin.map.show');
    }

}