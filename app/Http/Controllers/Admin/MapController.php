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
            //请求数据
            $k = $request->input('name');
            $data = $this->getMapCacheData($k);
            return $this->outPut($data);
        }

        return view('admin.map.show');
    }

    private function getMapCacheData($k)
    {
        /** @var BiUser $user */
        $user = Auth::user();
        if ($user->user_type == BiUser::USER_TYPE_CHANNEL) {
            $keyPre = DeviceObject::CACHE_CHANNEL_PRE;
        } elseif ($user->user_type == BiUser::USER_TYPE_BRAND) {
            $keyPre = DeviceObject::CACHE_BRAND_PRE;
        } else {
            $keyPre = DeviceObject::CACHE_ALL_PRE;
        }
        $typeId = $user->type_id;
        $cacheKeyPre = DeviceObject::CACHE_MAP_PRE . $keyPre . $typeId;
        $data = [];
        $cachekey = $cacheKeyPre . $k;
        $data[] = Cache::store('file')->get($cachekey);
        return $data;
    }

    public function getEbikeDataAction()
    {
        $name = $this->request->get('name', null, 'qixing');
        $cacheFile = APP_PATH . 'app/' . $name . '.json';
        $data = file_get_contents($cacheFile);
        $data = json_decode($data, true);
        return $this->responseJson(['gps' => $data]);
    }

    public function getEbikeCountAction()
    {
        $caches = [
            'qixing','tingche','lixian','shilian','jijiangguoqi','guoqi','quanbu','kucun',
        ];
        $out = [];
        foreach ($caches as $cache){
            $data = file_get_contents(APP_PATH . 'app/' . $cache . '.json');
            $data = json_decode($data, true);
            $out[$cache] = count($data);
        }
//        $out['quanbu'] = $out['qixing'] + $out['tingche'] + $out['lixian'] + $out['shilian'];
        return $this->responseJson($out);
    }

}