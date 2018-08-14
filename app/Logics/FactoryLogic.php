<?php

namespace App\Logics;


//工厂逻辑

use App\Models\BiDeliveryDevice;
use App\Models\BiDeliveryOrder;
use App\Models\BiOrder;
use App\Models\BiUser;
use App\Models\TDeviceCode;
use Carbon\Carbon;

class FactoryLogic extends BaseLogic
{

    //工厂角色名称
    public static $roleName = 'factory';

    public static function getAccountList()
    {
        $users = BiUser::all();
        $data = [];
        foreach ($users as $user){
            if($user->hasRole(self::$roleName)){
                $data[$user->id] = $user->nickname ? : $user->username;
            }
        }
        return $data;
    }

    public function shipment($id, $imeis)
    {

        $shipOrder = BiDeliveryOrder::find($id);
        if(!$shipOrder || in_array($shipOrder->state,[BiDeliveryOrder::DELIVERY_ORDER_STATE_FINISH, BiDeliveryOrder::DELIVERY_ORDER_STATE_CANCEL])){
            return false;
        }

        $insert = [];
        foreach ($imeis as $imei){
            if(!DeviceLogic::getUdid($imei)){
                return false;
            }
            $insert[] = [
                'delivery_order_id'=>$id,
                'imei'=>$imei,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ];
        }

        if($shipOrder->battery_type){
            foreach ($insert as $row){
                $imei = $row['imei'];
                RedisLogic::getRedis()->select(1);
                RedisLogic::hSet('battery_type', $imei, $shipOrder->battery_type);
            }
        }

        $order = BiOrder::find($shipOrder->order_id);

        foreach ($insert as $row){
            $imei = $row['imei'];
            DeviceLogic::deviceToChannel($imei, $order->channel_id, $order->customer_id, $order->scene_id);
            DeviceLogic::resetDevice($imei);
        }


        $res = BiDeliveryDevice::insert($insert);

        if($res){
            $shipOrder->state = BiDeliveryOrder::DELIVERY_ORDER_STATE_FINISH;//已完成
            $shipOrder->actuall_date = Carbon::now()->format('Y-m-d');
            $shipOrder->save();

            $count = count($imeis);
            $order->actuall_quantity += $count;//实际订单出货量
            if($count >= $order->ship_quantity){
                $order->state = BiOrder::ORDER_STATE_FINISH;//订单状态
            }
            $order->save();

            TDeviceCode::whereIn('imei',$imeis)->update([
                'delivered_at'=>Carbon::now(),
                'device_cycle'=>TDeviceCode::DEVICE_CYCLE_CHANNEL_STORAGE,
                'channel_id'=>$order->channel_id,
                'customer_id'=>$order->customer_id,
                'scene_id'=>$order->scene_id,
                'brand_id'=>$shipOrder->brand_id,
                'ebike_type_id'=>$shipOrder->ebike_type_id,
                'device_type'=>$order->device_type,
            ]);

        }
        return $res;
    }

}