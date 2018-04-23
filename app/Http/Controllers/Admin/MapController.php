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
use App\Models\BiEbikeType;
use App\Models\BiOrder;
use App\Models\BiUser;
use App\Models\TDevice;
use App\Models\TDeviceCode;
use App\Objects\DeviceObject;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class MapController extends BaseController
{
    public function show(Request $request)
    {
        if ($request->isXmlHttpRequest()) {

            if ($request->has('count')) {
                //请求数量
                return $this->outPut($this->getMapCount());
            } elseif ($request->has('name')) {
                //具体点
                $k = $request->input('name');
                $data = $this->getMapCacheData($k);
                return $this->outPut(['gps' => &$data]);
            }

        }

        return view('admin.map.show',[
            'keyMap'=>$this->getKeyMap(),
            'isCustomer'=>$this->isCustomer(),
        ]);
    }

    private function getKeyMap()
    {
        if ($this->isCustomer()) {
            $map = [
                TDeviceCode::DEVICE_CYCLE_CHANNEL_STORAGE => '渠道库存',//渠道库存
                DeviceObject::CACHE_LIST_RIDING => '骑行',
                DeviceObject::CACHE_LIST_PARK => '停车',
                DeviceObject::CACHE_LIST_OFFLINE_LESS_48 => '离线<48小时',
                DeviceObject::CACHE_LIST_OFFLINE_MORE_48 => '离线>48小时',
                TDeviceCode::DEVICE_CYCLE_LOST => '丢失',
                TDeviceCode::DEVICE_CYCLE_SCRAP => '报废',
            ];
        } else {
            $map = [
                TDeviceCode::DEVICE_CYCLE_STORAGE => '库存',//库存
                TDeviceCode::DEVICE_CYCLE_CHANNEL_STORAGE => '渠道库存',//渠道库存
                DeviceObject::CACHE_LIST_RIDING => '骑行',
                DeviceObject::CACHE_LIST_PARK => '停车',
                DeviceObject::CACHE_LIST_OFFLINE_LESS_48 => '离线<48小时',
                DeviceObject::CACHE_LIST_OFFLINE_MORE_48 => '离线>48小时',
                TDeviceCode::DEVICE_CYCLE_LOST => '丢失',
                TDeviceCode::DEVICE_CYCLE_SCRAP => '报废',
                TDeviceCode::DEVICE_CYCLE_CHANNEL_EXPIRE => '渠道过期',//渠道过期
                TDeviceCode::DEVICE_CYCLE_REFURBISHMENT_CHANNEL => '翻新渠道',//翻新渠道
                TDeviceCode::DEVICE_CYCLE_REFURBISHMENT_USER => '翻新用户',//翻新用户
                TDeviceCode::DEVICE_CYCLE_USE_EXPIRE => '使用过期',//使用过期
            ];
        }
        return $map;
    }

    private function getMapCacheData($k)
    {
        $keyPre = $this->getCustomerKeyPre();
        $user = Auth::user();
        $typeId = $user->type_id;
        $cacheKeyPre = DeviceObject::CACHE_MAP_PRE . $keyPre . $typeId;
        $cachekey = $cacheKeyPre . $k;
        return Cache::store('file')->get($cachekey) ?: [];
    }

    private function getMapCount()
    {
        $keyMap = $this->getKeyMap();
        $caches = array_keys($keyMap);
        /*$caches = [
            TDeviceCode::DEVICE_CYCLE_STORAGE,//库存
            TDeviceCode::DEVICE_CYCLE_CHANNEL_STORAGE,//渠道库存
            DeviceObject::CACHE_LIST_RIDING,
            DeviceObject::CACHE_LIST_PARK,
            DeviceObject::CACHE_LIST_OFFLINE_LESS_48,
            DeviceObject::CACHE_LIST_OFFLINE_MORE_48,
        ];*/

        $out = [];
        $keyPre = $this->getCustomerKeyPre();
        $user = Auth::user();
        $typeId = $user->type_id;
        $cacheKeyPre = DeviceObject::CACHE_MAP_PRE . $keyPre . $typeId;
        foreach ($caches as $k) {
            $cachekey = $cacheKeyPre . $k;
            $data = Cache::store('file')->get($cachekey) ?: [];
            $out[$k] = count($data);
        }
        return $out;
    }

}