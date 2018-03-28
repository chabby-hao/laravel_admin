<?php

namespace App\Logics;


use App\Models\BiOrder;
use App\Models\BiUser;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderLogic extends BaseLogic
{

    public function createOrder(array $data)
    {
        try {
            $order = new BiOrder();
            $order->user_id = $data['user_id'];
            $order->order_no = date('YmdHis') . mt_rand(1000,9999);
            $order->state = BiOrder::ORDER_STATE_INIT;
            $order->channel_id = $data['channel_id'];
            $order->order_quantity = $data['order_quantity'];
            $order->device_type = $data['device_type'];
            $order->expect_delivery = $data['expect_delivery'];
            $order->after_sale = $data['after_sale'];
            $order->remark = $data['remark'];
            return $order->save();
        } catch (\Exception $e) {
            Log::error('create order db error:' . $e->getMessage(), $order->toArray());
            return false;
        }
    }

    public function editOrder($id, $data)
    {
        try {
            $res = BiOrder::find($id)->update($data);
            return $res;
        } catch (\Exception $e) {
            Log::error('edit order db error:' . $e->getMessage());
            return false;
        }
    }

    /**
     * 作废订单
     * @param $id
     */
    public function cancelOrder($id)
    {
        $order = BiOrder::find($id);
        $res = false;
        if($order->state == BiOrder::ORDER_STATE_INIT && $order->ship_quantity == 0) {
            $order->state = BiOrder::ORDER_STATE_CANCEL;//作废
            $res = $order->save();
        }
        return $res;
    }

}