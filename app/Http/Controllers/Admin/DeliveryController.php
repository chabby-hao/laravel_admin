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
use App\Logics\OrderLogic;
use App\Models\BiBrand;
use App\Models\BiDeliveryOrder;
use App\Models\BiEbikeType;
use App\Models\BiOrder;
use App\Models\TDevice;
use App\Models\TDeviceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class DeliveryController extends BaseController
{

    private function getData()
    {
        $paginate = BiDeliveryOrder::join('bi_users', 'user_id', '=', 'bi_users.id')
            ->join('bi_orders','order_id','=','bi_orders.id')
            ->join('bi_device_types', 'device_type', '=', 'bi_device_types.id')
            ->join('bi_channels', 'channel_id', '=', 'bi_channels.id')
            ->orderBy('bi_delivery_orders.state')
            ->orderByDesc('bi_delivery_orders.id')
            ->select(['bi_delivery_orders.*', 'bi_orders.order_no', 'bi_users.username', 'bi_device_types.name as device_type_name','bi_channels.channel_name'])
            ->paginate();

        return $paginate;
    }

    public function factoryPanel(Request $request)
    {
        $paginate = $this->getData();

        return view('admin.delivery.factpanel',[
            'datas'=>$paginate->items(),
            'page_nav'=>MyPage::showPageNav($paginate),
        ]);
    }

    public function shipmentProcess(Request $request)
    {

    }



    public function list(Request $request)
    {
        $paginate = $this->getData();

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