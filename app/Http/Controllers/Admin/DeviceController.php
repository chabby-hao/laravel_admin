<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 18/3/14
 * Time: 下午3:37
 */

namespace App\Http\Controllers\Admin;


use App\Libs\MyPage;
use App\Logics\DeliveryLogic;
use App\Logics\DeviceLogic;
use App\Models\BiBrand;
use App\Models\TDevice;
use App\Models\TDeviceCode;
use App\Objects\FaultObject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceController extends BaseController
{


    public function detail(Request $request)
    {

        if ($request->isXmlHttpRequest()) {

            $id = $request->input('id');
            $name = $request->input('name');
            if ($id) {
                $udid = $this->getUdid($id);
            } elseif ($name) {
                $udid = DeviceLogic::getUdidByName($name);
            } else {
                return $this->outPutError('请填设备码');
            }
            if (!$udid) {
                return $this->outPutError('查找不到设备信息');
            }

            $deviceObj = DeviceLogic::createDeviceByUdid($udid);
            $data = (array)$deviceObj;

            //补充信息
            $data['romVersion'] = DeviceLogic::getRomVersionByUdid($udid);
            $data['ver'] = DeviceLogic::getVerByUdid($udid);

            $shipOrder = DeliveryLogic::getOrderShipInfo($data['imei']);

            $data['shipOrder'] = $shipOrder;
            $data['name'] = DeviceLogic::getNameByUdid($udid);
            $data['master'] = DeviceLogic::getAdminInfoByUdid($udid);
            $data['followers'] = DeviceLogic::getFollowersByUdid($udid);
            $data['gpsSatCount'] = DeviceLogic::getGpsSatCount($data['imei']);
            $data['lastLocation'] = DeviceLogic::getLastLocationInfo($data['imei']);

            $data['chassis'] = DeviceLogic::getChassisByUdid($udid);

            $data['faultControl'] = $data['faultSwitch'] = $data['faultMotor'] = $data['faultCharge'] = '正常';
            $faults = DeviceLogic::getFault($data['imei']);
            if($faults){
                //控制器
                if(in_array(FaultObject::EV_MESSAGE_POWER_SYSTEM_CONTROL,$faults)){
                    $data['faultControl'] = '异常';
                }
                //转把
                if(in_array(FaultObject::EV_MESSAGE_POWER_SYSTEM_SWITCH, $faults)){
                    $data['faultSwitch'] = '异常';
                }
                //电机状态
                if(in_array(FaultObject::EV_MESSAGE_POWER_SYSTEM_DRIVER, $faults)){
                    $data['faultMotor'] = '异常';
                }
                //电瓶故障
                if(!$data['charge']){
                    $data['faultCharge'] = '异常';
                }
            }

            $data['totalMiles'] = DeviceLogic::getTotalMilesByUdid($udid);
            $data['ridingTimes'] = DeviceLogic::getRidingTimesByUdid($udid);
            $data['chargingTimes'] = DeviceLogic::getChargingTimesByUdid($udid);


            if($lastTrip = DeviceLogic::getLastTripInfoByUdid($udid)){
                $tmp = [];
                $tmp['dateTime'] = Carbon::createFromTimestamp($lastTrip->begin)->toDateTimeString();
                $tmp['addressBegin'] = $lastTrip->addressBegin;
                $tmp['addressEnd'] = $lastTrip->addressEnd;
                $tmp['mile'] = $lastTrip->mile;
                $tmp['duration'] = number_format($lastTrip->duration/60, 1);
                $tmp['speed'] = number_format($tmp['mile'] / ($tmp['duration']/60), 1);
                $tmp['energy'] = DeviceLogic::getEnergyByMileage($tmp['mile']);
                $data['lastTrip'] = $tmp;
            }

            //详情AJAX
            return $this->outPut($data);
        }

        return view('admin.device.detail');
    }

    private function getUdid($id)
    {
        if ($udid = DeviceLogic::getUdid($id)) {
            //id=>imei
            return $udid;
        } elseif ($imei = DeviceLogic::getImei($id)) {
            //id=>udid
            return $id;
        } elseif ($udid = DeviceLogic::getUdidByImsi($id)) {
            //id=>imsi
            return $udid;
        } else {
            return false;
        }
    }

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
        foreach ($deviceList as $device) {
            $data[] = DeviceLogic::createDevice($device->imei);
        }


        return view('admin.device.list', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($devices),
        ]);


    }

}