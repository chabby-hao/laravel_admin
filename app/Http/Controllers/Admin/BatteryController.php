<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 18/3/14
 * Time: 下午3:37
 */

namespace App\Http\Controllers\Admin;

use App\Logics\StatLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BatteryController extends BaseController
{


    public function stat(Request $request)
    {

        if($request->isXmlHttpRequest() || $request->input('a') == 1){
            $keypre = $this->getCustomerKeyPre();
            $id = Auth::user()->type_id;
            $data = [
                'batteryQuantities' => StatLogic::getBatteryQuantities($keypre, $id),
                'chargeTimes' => StatLogic::getChargeTimes($keypre, $id),
                'batteryStateDistribution' => StatLogic::getBatteryStateDistribution($keypre, $id),
                'remainElectricity' => StatLogic::getRemainElectricity($keypre, $id),
                'batteryUsingTimeDistribution' => StatLogic::getBatteryUsingTimeDistribution($keypre, $id),
            ];
            return $this->outPut($data);
        }

        return view('admin.battery.stat');
    }

}