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
use App\Logics\FactoryLogic;
use App\Models\BiBrand;
use App\Models\BiDeliveryDevice;
use App\Models\BiDeliveryOrder;
use App\Models\BiDeviceType;
use App\Models\BiEbikeType;
use App\Models\BiOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class DeliveryController extends BaseController
{

    private function getData($where = [], $showCancel = true)
    {
        $model = BiDeliveryOrder::join('bi_users', 'user_id', '=', 'bi_users.id')
            ->join('bi_orders','order_id','=','bi_orders.id')
            ->join('bi_device_types', 'device_type', '=', 'bi_device_types.id')
            ->join('bi_channels', 'channel_id', '=', 'bi_channels.id')
            ->where($where);

        if(!$showCancel){
            $model->where('bi_delivery_orders.state','!=',BiDeliveryOrder::DELIVERY_ORDER_STATE_CANCEL);
        }

        $paginate = $model
            ->orderBy('bi_delivery_orders.state')
            ->orderByDesc('bi_delivery_orders.id')
            ->select(['bi_delivery_orders.*', 'bi_orders.order_no', 'bi_users.username', 'bi_device_types.name as device_type_name','bi_channels.channel_name'])
            ->paginate();

        return $paginate;
    }

    public function factoryPanel(Request $request)
    {

        $where = [];

        $paginate = $this->getData($where, false);

        return view('admin.delivery.factpanel',[
            'datas'=>$paginate->items(),
            'page_nav'=>MyPage::showPageNav($paginate),
        ]);
    }

    public function shipmentProcess(Request $request)
    {

        $inputFileName = 'myfile';
        if($request->isXmlHttpRequest() && $request->hasFile($inputFileName)){
            //上传文件

            $data = Helper::readExcelFromRequest($request, $inputFileName);

            if(!$data){
                return $this->outPutError('请确认文件格式正确');
            }

            //取出第一行
            array_shift($data);

            $data = Helper::transToOneDimensionalArray($data, 0);
            return $this->outPut(['data'=>$data]);

        }elseif($request->isXmlHttpRequest() && $request->has('data')){
            //提交imei出货

            $id = $this->getId($request);

            $shipOrder = BiDeliveryOrder::find($id);

            //提交imeis
            $imeis = $request->input('data');//array

            //重复
            if(max(array_count_values($imeis)) > 1){
                $unique = array_unique($imeis);
                $diff = array_diff_assoc($imeis, $unique);
                $repeat = array_values(array_unique($diff));
                return $this->outPutError('IMEI重复', ['data'=>$repeat]);//重复的IMEI返回回去
            }

            //出货量不对
            if(count($imeis) !== intval($shipOrder->delivery_quantity)){
                return $this->outPutError('出货量不对');
            }

            //IMEI已被用
            $devices = BiDeliveryDevice::whereIn('imei', $imeis)->get(['imei'])->toArray();
            if($devices){
                return $this->outPutError('IMEI已被用',['data'=>Helper::transToOneDimensionalArray($devices,'imei')]);
            }


            $logic = new FactoryLogic();
            $res = $logic->shipment($id, $imeis);
            if($res){
                //return $this->outPutSuccess();
                return $this->outPutRedirect(URL::action('Admin\DeliveryController@factoryPanel'));
            }
            return $this->outPutError('操作失败,请确认imei列表输入正确');

        }


        $id = $this->getId($request);
        $data = BiDeliveryOrder::find($id);
        $order = BiOrder::find($data->order_id);
        $data->device_type_name = BiDeviceType::getNameMap()[$order->device_type];

        return view('admin.delivery.shipprocess',[
            'data'=>$data,
        ]);
    }

    /**
     * 按设备号
     * @param Request $request
     */
    public function listDevice(Request $request)
    {
        $where = [];
        if($request->input('delivery_order_id')){
            $where['delivery_order_id'] = $request->input('delivery_order_id');
        }
        $paginate = BiDeliveryOrder::join('bi_delivery_devices','delivery_order_id','=','bi_delivery_orders.id')
            ->join('bi_users', 'user_id', '=', 'bi_users.id')
            ->join('bi_orders','order_id','=','bi_orders.id')
            ->join('bi_device_types', 'device_type', '=', 'bi_device_types.id')
            ->join('bi_channels', 'channel_id', '=', 'bi_channels.id')
            ->where($where)
            ->orderBy('bi_delivery_orders.state')
            ->orderByDesc('bi_delivery_orders.id')
            ->select(['bi_delivery_devices.imei','bi_delivery_orders.*', 'bi_orders.order_no', 'bi_users.username', 'bi_device_types.name as device_type_name','bi_channels.channel_name'])
            ->paginate();

        $datas = $paginate->items();

        foreach ($datas as $data){
            $data->udid = DeviceLogic::getUdid($data->imei);
            $data->imsi = DeviceLogic::getImsi($data->imei);
            $data->brand_name = DeviceLogic::getBrandName($data->imei);
            $data->ebike_type_name = DeviceLogic::getEbikeTypeNameByUdid($data->udid);
            /*$data->brand_name = DeviceLogic::getBrandName($data->imei);
            $data->ebike_type_name = DeviceLogic::getEbikeTypeNameByUdid($data->udid);*/
        }

        return view('admin.delivery.listdevice', [
            'datas' => $datas,
            'page_nav' => MyPage::showPageNav($paginate),
        ]);

    }

    public function list(Request $request)
    {
        $where = [];
        if($request->input('order_id')){
            $where['order_id'] = $request->input('order_id');
        }

        $paginate = $this->getData($where);

        $datas = $paginate->items();


        /** @var BiDeliveryOrder $data */
        foreach ($datas as $data){
            $data->brand_name = $data->brand_id ? BiBrand::getBrandMap()[$data->brand_id] : '';
            $data->ebike_type_name = $data->ebike_type_id ? BiEbikeType::getTypeName()[$data->ebike_type_id] : '';
        }

        return view('admin.delivery.list', [
            'datas' => $datas,
            'page_nav' => MyPage::showPageNav($paginate),
        ]);

    }

    public function add(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $input = $this->checkParams([
                'order_id',
                'part_number',
                'fact_id',
                'delivery_date',
                'delivery_quantity',
                'brand_id',
                'ebike_type_id',
            ], $request->input(), ['brand_id', 'ebike_type_id']);

            $input['user_id'] = Auth::id();

            $logic = new DeliveryLogic();
            if (!$logic->checkShipQuantity($input['order_id'], $input['delivery_quantity'])) {
                return $this->outPutError('出货数量不正确');
            }
            if ($logic->createDeliveryOrder($input)) {
                //return $this->outPutSuccess();
                return $this->outPutRedirect(URL::action('Admin\DeliveryController@list'));
            }

            return $this->outPutError('添加失败 ');
        }

        return view('admin.delivery.add');

    }

    public function edit(Request $request)
    {

        $id = $this->getId($request);

        if ($request->isXmlHttpRequest()) {
            $input = $this->checkParams([
                'delivery_date',
                'delivery_quantity',
            ], $request->input());

            //$input['user_id'] = Auth::id();

            $orderLogic = new DeliveryLogic();
            if ($orderLogic->editDeliveryOrder($id, $input)) {
                //return $this->outPutSuccess();
                return $this->outPutRedirect(URL::action('Admin\DeliveryController@list'));
            }

            return $this->outPutError('操作失败,请确认出货数量正确');
        }

        $data = BiDeliveryOrder::find($id);

        return view('admin.delivery.edit', [
            'data' => $data,
        ]);

    }

    public function delete(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $id = $this->getId($request);
            $orderLogic = new DeliveryLogic();
            $res = $orderLogic->cancelDeliveryOrder($id);
            if ($res) {
                return $this->outPutSuccess();
            }
            return $this->outPutError();
        }
        return abort(403);
    }

}