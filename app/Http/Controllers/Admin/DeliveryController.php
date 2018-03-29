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
use App\Models\BiOrder;
use App\Models\TDevice;
use App\Models\TDeviceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class DeliveryController extends BaseController
{

    public function list(Request $request)
    {
        $paginate = BiOrder::join('bi_users', 'user_id', '=', 'bi_users.id')->join('bi_device_types', 'device_type', '=', 'bi_device_types.id')->orderBy('state')->orderByDesc('bi_orders.id')->select(['bi_orders.*', 'bi_device_types.name', 'bi_users.username'])->paginate();

        return view('admin.order.list', [
            'datas' => $paginate->items(),
            'page_nav' => MyPage::showPageNav($paginate),
        ]);

    }

    public function add(Request $request)
    {


        if ($request->isXmlHttpRequest()) {
            $input = $this->checkParams([
                'channel_id',
                'order_quantity',
                'device_type',
                'expect_delivery',
                'after_sale',
                'remark',
            ], $request->input(), ['remark']);

            $input['user_id'] = Auth::id();

            $orderLogic = new OrderLogic();
            if ($orderLogic->createOrder($input)) {
                //return $this->outPutSuccess();
                return $this->outPutRedirect(URL::action('Admin\OrderController@list'));
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
                //'channel_id',
                //'order_quantity',
                //'device_type',
                'expect_delivery',
                //'after_sale',
                'remark',
            ], $request->input(), ['remark']);

            //$input['user_id'] = Auth::id();

            $orderLogic = new OrderLogic();
            if ($orderLogic->editOrder($id, $input)) {
                //return $this->outPutSuccess();
                return $this->outPutRedirect(URL::action('Admin\OrderController@list'));
            }

            return $this->outPutError('操作失败 ');
        }

        $data = BiOrder::find($id);

        return view('admin.order.edit', [
            'data' => $data,
        ]);

    }

    public function delete(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $id = $this->getId($request);
            $orderLogic = new OrderLogic();
            $res = $orderLogic->cancelOrder($id);
            if ($res) {
                return $this->outPutSuccess();
            }
            return $this->outPutError();
        }
        return abort(403);
    }

}