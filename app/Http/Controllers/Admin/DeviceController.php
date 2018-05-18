<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 18/3/14
 * Time: 下午3:37
 */

namespace App\Http\Controllers\Admin;


use App\Libs\Helper;
use App\Libs\MyPage;
use App\Logics\DeliveryLogic;
use App\Logics\DeviceLogic;
use App\Logics\DewinLogic;
use App\Logics\MileageLogic;
use App\Logics\MsgLogic;
use App\Logics\RedisLogic;
use App\Models\BiBrand;
use App\Models\BiChannel;
use App\Models\BiDeviceType;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\BiUser;
use App\Models\TDevice;
use App\Models\TDeviceCode;
use App\Models\TEvMileageGp;
use App\Models\TLockLog;
use App\Models\TUser;
use App\Models\TUserMsg;
use App\Objects\DeviceObject;
use App\Objects\FaultObject;
use App\Objects\LocationObject;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

class DeviceController extends BaseController
{


    public function detail(Request $request)
    {

        $cookieKey = 'lastIds';
        $lastIds = $request->cookie($cookieKey, "[]");

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

            if (!TDeviceCode::where($this->getWhere())->first()) {
                return $this->outPutError('设备码无权限查看');
            }

            $deviceObj = DeviceLogic::createDeviceByUdid($udid);
            $data = (array)$deviceObj;

            //补充信息
            $data['imsi'] = DeviceLogic::getImsi($data['imei']);
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
            if ($faults) {
                //控制器
                if (in_array(FaultObject::EV_MESSAGE_POWER_SYSTEM_CONTROL, $faults)) {
                    $data['faultControl'] = '异常';
                }
                //转把
                if (in_array(FaultObject::EV_MESSAGE_POWER_SYSTEM_SWITCH, $faults)) {
                    $data['faultSwitch'] = '异常';
                }
                //电机状态
                if (in_array(FaultObject::EV_MESSAGE_POWER_SYSTEM_DRIVER, $faults)) {
                    $data['faultMotor'] = '异常';
                }
                //电瓶故障
                if (!$data['charge']) {
                    $data['faultCharge'] = '异常';
                }
            }

            $data['totalMiles'] = DeviceLogic::getTotalMilesByUdid($udid);
            $data['ridingTimes'] = DeviceLogic::getRidingTimesByUdid($udid);
            $data['chargingTimes'] = DeviceLogic::getChargingTimesByUdid($udid);


            if ($lastTrip = DeviceLogic::getLastTripInfoByUdid($udid)) {
                $data['lastTrip'] = $this->getMileageInfo($lastTrip);
            }


            //url
            $data['locationUrl'] = URL::action('Admin\DeviceController@locationList', ['imei' => $data['imei']]);
            $data['lockLogUrl'] = URL::action('Admin\DeviceController@lockLogList', ['imei' => $data['imei']]);
            $data['historyStateUrl'] = Url::action('Admin\DeviceController@historyState', ['imei' => $data['imei']]);
            $data['mileageUrl'] = Url::action('Admin\DeviceController@mileageList', ['id' => $udid]);


            //服务信息
            $data['paymentInfo'] = DeviceLogic::getPaymentInfoByUdid($udid);

            //保险
            $data['insureList'] = DeviceLogic::getInsureOrderListByUdid($udid)->toArray();
            $data['insureListHas'] = $data['insureList'] ? true : false;

            //安全区域
            $data['safeZoneList'] = DeviceLogic::getSafeZoneListByUdid($udid)->toArray();
            $data['safeZoneListHas'] = $data['safeZoneList'] ? true : false;

            //提醒消息
            $data['msg'] = $this->getMsgCount($udid);


            $lastIds = json_decode($lastIds, true);

            if ($id) {
                //只存设备码，imei，imsi,不存name
                if (($k = array_search($id, $lastIds)) !== false) {
                    unset($lastIds[$k]);
                    array_unshift($lastIds, $id);
                } else {
                    array_unshift($lastIds, $id);
                    if (count($lastIds) > 5) {
                        array_pop($lastIds);
                    }
                }
            }
            $cookie = Cookie::make($cookieKey, json_encode($lastIds), 60 * 24 * 30);
            //详情AJAX
            return $this->outPutWithCookie($data, $cookie);
        }

        return view('admin.device.detail', [
            'lastIds' => json_decode($lastIds, true),
        ]);
    }

    private function getMsgCount($udid)
    {
        $typeMap = [
            'safe' => [
                //安全
                TUserMsg::MESSAGE_TYPE_INSIDE,//进入安全
                TUserMsg::MESSAGE_TYPE_NEW_OUTSIDE,//离开安全
                TUserMsg::MESSAGE_TYPE_NEW_MOTOR_SHAKE,
                TUserMsg::MESSAGE_TYPE_NEW_MOTOR_FORGET,
            ],

            'inuse' => [
                //用车
                TUserMsg::MESSAGE_TYPE_MOTOR_LOCK,//锁车提醒
                TUserMsg::MESSAGE_TYPE_MOTOR_UNLOCK,//解锁
                TUserMsg::MESSAGE_TYPE_NEW_MOTOR_BATTERY,//电瓶断开
            ],

            'care' => [
                //关怀
                TUserMsg::MESSAGE_TYPE_LOW_POWER,//低电量
                TUserMsg::MESSAGE_TYPE_WEATHER_NOTICE,//天气提醒
                TUserMsg::MESSAGE_TYPE_CARE_NOTICE,//保养提醒
            ],

            'fault' => [
                //故障
                TUserMsg::MESSAGE_TYPE_FAULT_NOTICE,
            ]
        ];

        $data = [];
        foreach ($typeMap as $k => $types) {
            $data[$k] = array_map(function ($type) use ($udid) {
                return TUserMsg::getTypeNameMap($type) . MsgLogic::getMsgTypeCount($udid, $type) . '次';
            }, $types);
        }
        return $data;
    }

    private function getMileageInfo($mileRow)
    {
        $tmp = [];
        $tmp['udid'] = $mileRow->udid;
        $tmp['dateTime'] = Carbon::createFromTimestamp($mileRow->begin)->toDateTimeString();
        /*$tmp['addressBegin'] = $lastTrip->addressBegin;
        $tmp['addressEnd'] = $lastTrip->addressEnd;*/
        $tmp['mile'] = $mileRow->mile;
        $tmp['duration'] = number_format($mileRow->duration / 60, 1);
        $tmp['speed'] = number_format($tmp['mile'] / ($mileRow->duration / 60 / 60), 1);
        $tmp['energy'] = DeviceLogic::getEnergyByMileage($tmp['mile']);
        return $tmp;
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
        } elseif ($imei = RedisLogic::getImeiByBatteryId($id)) {
            //id=>batteryId
            return DeviceLogic::getUdid($imei);
        } elseif ($udid = DewinLogic::getUdidByDewinId($id)) {
            //id=>dewinId
            return $udid;
        } else {
            return false;
        }
    }

    public function exportList()
    {
        $model = TDeviceCode::getDeviceModel();

        $this->listSearch($model);
        $deviceList = $model->orderByDesc('active')->select(['*'])->get()->toArray();

        $deviceTypeMap = BiDeviceType::getNameMap();
        $channelMap = BiChannel::getChannelMap();
        $brandMap = BiBrand::getBrandMap();
        $ebikeTypeMap = BiEbikeType::getTypeName();
        $productTypeMap = BiProductType::getNameMap();
        $deviceCycleMap = TDeviceCode::getCycleMap();

        $data = [];
        foreach ($deviceList as $k => $device) {
            //$data[] = DeviceLogic::createDevice($device->imei);
            //$tmp = DeviceLogic::getDeviceFromCacheByUdid($device['qr']) ?: DeviceLogic::simpleCreateDevice($device['imei']);
            $data[] = [
                'udid' => '`' . $device['qr'],
                'deviceTypeName' => $deviceTypeMap[$device['device_type']],
                'channelName' => $channelMap[$device['channel_id']],
                'brandName' => $brandMap[$device['brand_id']],
                'ebikeTypeName' => $ebikeTypeMap[$device['ebike_type_id']],
                'activeAt' => $device['active'] ? date('Y-m-d H:i:s', $device['active']) : '',
                'deviceCycleTrans' => $deviceCycleMap[$device['device_cycle']],
                'productType' => $productTypeMap[$device['model']],
            ];
            unset($deviceList[$k]);
        }

        $file = 'export-' . date('YmdHis');
        $path = 'export/excel/';

        Helper::exportExcel([
            '设备码',
            '型号',
            '渠道',
            '品牌',
            '车型',
            '激活时间',
            '设备周期',
            '产品类型'
        ], $data, $file, public_path($path), false);
        $fileUrl = asset($path . $file . '.xlsx');
        return $this->outputRedictWithoutMsg($fileUrl);
    }

    /**
     * 缓存策略：按照ID缓存,in(1,2,3,4)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {

        $model = TDeviceCode::getDeviceModel();

        $this->listSearch($model);

        $devices = $model->orderByDesc('active')->paginate(100);
        $deviceList = $devices->items();

        $data = [];
        $deviceTypeMap = BiDeviceType::getNameMap();
        $brandMap = BiBrand::getBrandMap();
        $ebikeTypeMap = BiEbikeType::getTypeName();
        $channelMap = BiChannel::getChannelMap();

        /** @var TDeviceCode $device */
        foreach ($deviceList as $device) {
            //$data[] = DeviceLogic::createDevice($device->imei);
            $deviceObj = DeviceLogic::getDeviceFromCacheByUdid($device->qr) ?: DeviceLogic::simpleCreateDevice($device->imei);
            $deviceObj->setDeviceTypeName($deviceTypeMap[$device->device_type]);
            $deviceObj->setEbikeTypeName($ebikeTypeMap[$device->ebike_type_id]);
            $deviceObj->setBrandName($brandMap[$device->brand_id]);
            $deviceObj->setChannelName($channelMap[$device->channel_id]);
            $data[] = $deviceObj;
        }

        if (!$this->isCustomer()) {
            //全部使用缓存,
            list($deviceStatusMap, $deviceCycleMap) = $this->getDeviceCacheKey();
        } else {
            //渠道,品牌
            list($deviceStatusMap, $deviceCycleMap) = $this->getDeviceCountKey();
        }

        $provinceList = DeviceLogic::getProvinceList($this->getWhere());

        return view('admin.device.list', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($devices),
            'deviceStatusMap' => $deviceStatusMap,
            'deviceCycleMap' => $deviceCycleMap,
            'provinceList' => $provinceList,
        ]);

    }

    private function getDeviceCountKey()
    {
        $deviceStatusMap = DeviceObject::getDeviceStatusCacheMap();
        $deviceCycleMap = TDeviceCode::getChannelCycleMap();

        $deviceStatusMap = $this->getCountMap($deviceStatusMap);
        $deviceCycleMap = $this->getCountMap($deviceCycleMap);

        return [$deviceStatusMap, $deviceCycleMap];
    }

    private function getCountMap($map)
    {
        $keyPre = $this->getCustomerKeyPre();
        $where = $this->getWhere();
        $cacheTime = Carbon::now()->addMinutes(15);
        $typeId = Auth::user()->type_id;
        foreach ($map as $k => $row) {
            $cacheKey = DeviceObject::CACHE_LIST_PRE . $k;
            $sids = Cache::store('file')->get($cacheKey);
            $count = Cache::store('file')->remember(DeviceObject::CACHE_LIST_COUNT_PRE . $keyPre . $typeId . $k, $cacheTime, function () use ($sids, $where) {
                //$count = TDeviceCode::getDeviceModel()->whereIn('qr', $udids)->where($where)->count();
                $count = TDeviceCode::getDeviceModel()->whereIn('sid', $sids)->where($where)->count();
                return $count;
            });

            $map[$k] = $row . "($count)";
        }
        return $map;
    }

    private function getWhere()
    {
        $where = [];
        /** @var BiUser $user */
        $user = Auth::user();
        if ($user->user_type == BiUser::USER_TYPE_CHANNEL) {
            //渠道商
            $where['channel_id'] = $user->type_id;
        } elseif ($user->user_type == BiUser::USER_TYPE_BRAND) {
            //品牌商
            $where['brand_id'] = $user->type_id;
        }
        return $where;
    }

    /**
     * @param TDeviceCode $model
     * @return mixed
     */
    private function listSearch($model)
    {
        if ($status = \Request::input('status')) {
            $cacheKey = DeviceObject::CACHE_LIST_PRE . $status;
            $ids = Cache::store('file')->get($cacheKey) ?: [];
            $model->whereIn('sid', $ids);
        }

        if ($id = \Request::input('id')) {
            $udid = $this->getUdid($id);
            $model->whereQr($udid);
        }

        if ($deviceType = \Request::input('device_type')) {
            $model->whereDeviceType($deviceType);
        }

        if ($channel = \Request::input('channel_id')) {
            $model->whereChannelId($channel);
        }

        if ($brand = \Request::input('brand_id')) {
            $model->whereBrandId($brand);
        }

        if ($ebikeType = \Request::input('ebike_type_id')) {
            $model->whereEbikeTypeId($ebikeType);
        }

        //省市筛选
        if (\Request::input('province') || $city = \Request::input('city')) {
            $where = [
                'province' => \Request::input('province'),
                'city' => \Request::input('city'),
            ];
            $where = array_filter($where);
            $model->join('t_device', 'qr', '=', 'udid')
                ->where($where)
                ->select('t_device_code.*');
        }

        $model->where($this->getWhere());

        return $model;
    }

    private function getDeviceCacheKey()
    {
        $deviceStatusMap = DeviceObject::getDeviceStatusCacheMap();
        $deviceCycleMap = TDeviceCode::getCycleMap();
        foreach ($deviceStatusMap as $k => $row) {
            $deviceStatusMap[$k] = $row . '(' . Cache::store('file')->get(DeviceObject::CACHE_LIST_COUNT_PRE . $k) . ')';
        }
        foreach ($deviceCycleMap as $k => $row) {
            $deviceCycleMap[$k] = $row . '(' . Cache::store('file')->get(DeviceObject::CACHE_LIST_COUNT_PRE . $k) . ')';
        }
        return [$deviceStatusMap, $deviceCycleMap];
    }

    public function locationList()
    {

        $imei = Input::get('imei');
        $udid = DeviceLogic::getUdid($imei);

        list($startDatetime, $endDatetime) = $this->getDaterange();

        $where = [];
        $where['udid'] = $imei;
        if ($type = Input::get('type')) {
            if ($type == LocationObject::TYPE_GPS_REPEAT) {
                $where['type'] = LocationObject::TYPE_GPS;
                $where['repeat'] = 1;
            } elseif ($type == LocationObject::TYPE_GPS) {
                $where['type'] = $type;
                $where['repeat'] = 0;
            } else {
                $where['type'] = $type;
            }
        }

        $whereBetween = ['create_time', [Carbon::parse($startDatetime)->getTimestamp(), Carbon::parse($endDatetime)->getTimestamp()]];
        $paginate = $this->getUnionTablePaginate('t_location_new_', $where, $whereBetween, 'location', $startDatetime, $endDatetime);

        $data = $paginate->items();

        foreach ($data as &$row) {
            $row->datetime = Carbon::createFromTimestamp($row->create_time)->toDateTimeString();
            $row->location_type = $row->type . '定位';
            if ($row->repeat == 1 && $row->type == 'GPS') {
                $row->location_type = 'GPS(repeat)';
                $row->address = Carbon::createFromTimestamp($row->begin)->toDateTimeString() . $row->address;
            }
            $row->gsm = $row->gsmStrength ? '-' . $row->gsmStrength . 'DB' : '';
            $row->usb_trans = is_numeric($row->usb) ? ($row->usb ? '是' : '否') : '';
        }

        return view('admin.device.locationlist', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($paginate),
            'udid' => $udid,
            'start' => $startDatetime,
            'end' => $endDatetime,
        ]);
    }

    public function historyState()
    {
        $imei = Input::get('imei');
        $udid = DeviceLogic::getUdid($imei);
        list($startDatetime, $endDatetime) = $this->getDaterange();

        $where = ['udid' => $udid];
        $whereBetween = ['create_time', [Carbon::parse($startDatetime)->getTimestamp(), Carbon::parse($endDatetime)->getTimestamp()]];
        $paginate = $this->getUnionTablePaginate('t_ev_state_', $where, $whereBetween, 'care', $startDatetime, $endDatetime);

        $data = $paginate->items();

        foreach ($data as $row) {
            $row->datetime = Carbon::createFromTimestamp($row->create_time)->toDateTimeString();
            $row->ev_key_trans = $row->ev_key ? '开' : '关';
            $row->ev_lock_trans = $row->ev_lock ? '已锁' : '未锁';
            $row->voltage = max($row->voltage, $row->local_voltage) / 10;
            $row->usb_trans = $row->usb ? '是' : '否';
        }

        return view('admin.device.historystate', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($paginate),
            'udid' => $udid,
            'start' => $startDatetime,
            'end' => $endDatetime,
        ]);

    }

    public function lockLogList()
    {
        $imei = Input::get('imei');
        $udid = DeviceLogic::getUdid($imei);

        list($startDatetime, $endDatetime) = $this->getDaterange();

        $map = DeviceObject::getLockTypeMap();
        $keys = array_keys($map);

        $paginate = TLockLog::whereUdid($udid)->whereIn('act', $keys)->orderByDesc('id')->paginate();

        $data = $paginate->items();
        /** @var TLockLog $row */
        foreach ($data as $row) {
            $row->act_trans = $map[$row->act];
            if (!$row->uid) {
                list($user, $from) = explode('-', $row->username);
                $row->user = $user;
                $row->from = $from;
            } else {
                $row->from = '超牛管家';
                $row->user = $row->phone;
            }
            $row->lock_type_trans = TLockLog::getLockTypeMap($row->type);
        }

        //$devices = TLockLog::->orderByDesc('sid')->select('t_device_code.*')->paginate();

        return view('admin.device.lockloglist', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($paginate),
            'udid' => $udid,
            'start' => $startDatetime,
            'end' => $endDatetime,
        ]);

    }

    public function mileageList()
    {

        $type = Input::get('type');
        $id = Input::get('id');

        $model = TEvMileageGp::join('t_device_code', 'udid', '=', 'qr')->where($this->getWhere());


        list($startDatetime, $endDatetime) = $this->getDaterange(Carbon::now()->startOfDay()->subDays(1)->toDateTimeString());

        $whereBetween = ['begin', [Carbon::parse($startDatetime)->getTimestamp(), Carbon::parse($endDatetime)->getTimestamp()]];
        $model->whereBetween($whereBetween[0], $whereBetween[1]);

        $where = [];
        if ($id && $udid = $this->getUdid($id)) {
            $where['udid'] = $udid;
            $model->where($where);
        } elseif ($id && empty($udid)) {
            $model->where(['udid' => '66666666666']);//查不到哎
        }

        if ($type == MileageLogic::MILE_TYPE_NORMAL) {
            $model->where('mile', '<', MileageLogic::MAX_MILE);
        } elseif ($type == MileageLogic::MILE_TYPE_ABNORMAL) {
            $model->where('mile', '>=', MileageLogic::MAX_MILE);
        }

        $paginate = $model->orderByDesc('begin')->select('t_ev_mileage_gps.*')->paginate();

        $data = $paginate->items();

        $rs = [];
        foreach ($data as $row) {
            $rs[] = $this->getMileageInfo($row);
        }

        //数量


        return view('admin.device.mileagelist', [
            'datas' => $rs,
            'page_nav' => MyPage::showPageNav($paginate),
            //'countMap' => MileageLogic::getMileCountMap($whereBetween, $where),
            'start' => $startDatetime,
            'end' => $endDatetime,
        ]);

    }

    /**
     * 导入地区
     */
    public function importCity(Request $request)
    {
        $inputFileName = 'myfile';
        if ($request->isXmlHttpRequest() && $request->hasFile($inputFileName)) {
            //上传文件

            $data = Helper::readExcelFromRequest($request, $inputFileName);

            if (!$data) {
                return $this->outPutError('请确认文件格式正确');
            }

            //取出第一行
            array_shift($data);

            $udids = Helper::transToOneDimensionalArray($data, 0);

            //重复
            if (max(array_count_values($udids)) > 1) {
                $unique = array_unique($udids);
                $diff = array_diff_assoc($udids, $unique);
                $repeat = array_values(array_unique($diff));
                $text = implode("<br>", $repeat);
                return $this->outPutError('设备码重复:<br>' . $text);//重复的IMEI返回回去
            }

            $rs = TDeviceCode::whereIn('qr', $udids)->select('qr')->get()->toArray();

            $realUdids = Helper::transToOneDimensionalArray($rs, 'qr');

            if (count($realUdids) !== count($udids)) {
                //udid有不正确的
                $arr = array_diff($udids, $realUdids);
                $text = implode("<br>", $arr);
                return $this->outPutError('设备码错误:<br>' . $text);
            }

            if (DeviceLogic::importCity($data)) {
                return $this->outPutSuccess();
            } else {
                return $this->outPutError('导入失败,请稍后重试');
            }

        }
    }

    public function searchCity(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $province = $request->input('province');

            $rs = TDevice::whereProvince($province)->select('city')->distinct()->get()->toArray();
            $citys = Helper::transToOneDimensionalArray($rs, 'city');

            return $this->outPut(['list' => $citys]);
        }
    }

    public function map()
    {
        return view('admin.device.map');
    }
}