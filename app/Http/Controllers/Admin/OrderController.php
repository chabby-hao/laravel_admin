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
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    public function list(Request $request)
    {
        return view();


    }

    public function add(Request $request)
    {

    }

}