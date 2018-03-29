<?php

namespace App\Logics;


use App\Models\BiDeliveryOrder;
use App\Models\BiOrder;
use App\Models\BiUser;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DeliveryLogic extends BaseLogic
{

    public function checkShipQuantity($orderId, $shipQuantity)
    {
        if (!is_numeric($shipQuantity)) {
            return false;
        }
        $order = BiOrder::find($orderId);
        if ($order && $order->order_quantity - $order->ship_quantity >= $shipQuantity && $shipQuantity > 0) {
            return true;
        }
        return false;
    }


    public function createDeliveryOrder(array $data)
    {
        try {
            $data['ship_no'] = 'D' . date('YmdHis') . mt_rand(1000, 9999);
            $data['state'] = BiDeliveryOrder::DELIVERY_ORDER_STATE_INIT;
            $res = BiDeliveryOrder::create($data);
            if ($res) {
                $order = BiOrder::find($data['order_id']);
                $order->incrementShipQuantity(intval($data['delivery_quantity']));
            }
            return $res;
        } catch (\Exception $e) {
            Log::error('createDeliveryOrder db error:' . $e->getMessage(), $data);
            return false;
        }
    }

    public function editDeliveryOrder($id, $data)
    {
        try {
            //$order->order_quantity - $order->ship_quantity;

            $deliOrder =BiDeliveryOrder::find($id);
            $orderId = $deliOrder['order_id'];
            $order = BiOrder::find($orderId);
            $icre = $data['delivery_quantity'] - $deliOrder['delivery_quantity'];

            if($icre > 0){
                //增加
                if($order->order_quantity - $order->ship_quantity >= $icre){
                    //ok
                    $order->incrementShipQuantity($icre);
                }else{
                    //no
                    return false;
                }
            }else{
                //减少
                //ok
                $order->decrementShipQuantity(abs($icre));
            }

            $deliOrder->update($data);
            $res = $deliOrder->update($data);
            return $res;
        } catch (\Exception $e) {
            Log::error('editDeliveryOrder db error:' . $e->getMessage(), $data);
            return false;
        }
    }

    /**
     * 作废出货单
     * @param $id
     */
    public function cancelDeliveryOrder($id)
    {
        $shipOrder = BiDeliveryOrder::find($id);
        $res = false;
        //待工厂处理
        if ($shipOrder->state == BiDeliveryOrder::DELIVERY_ORDER_STATE_INIT) {
            $shipOrder->state = BiDeliveryOrder::DELIVERY_ORDER_STATE_CANCEL;//作废
            $res = $shipOrder->save();
            if($res){
                $order = BiOrder::find($shipOrder->order_id);
                $order->decrementShipQuantity($shipOrder->delivery_quantity);
            }
        }
        return $res;
    }

}