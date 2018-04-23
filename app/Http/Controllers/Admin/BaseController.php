<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Helper;
use App\Models\BiUser;
use App\Objects\DeviceObject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BaseController extends Controller
{


    protected function isCustomer()
    {
        if (Auth::user()->user_type == BiUser::USER_TYPE_ALL) {
            //全部使用缓存
            return false;
        } else {
            return true;
        }
    }

    protected function getCustomerKeyPre()
    {
        /** @var BiUser $user */
        $user = Auth::user();
        if ($user->user_type == BiUser::USER_TYPE_CHANNEL) {
            //渠道商
            return DeviceObject::CACHE_CHANNEL_PRE;
        } elseif ($user->user_type == BiUser::USER_TYPE_BRAND) {
            //品牌商
            return DeviceObject::CACHE_BRAND_PRE;
        }else{
            return DeviceObject::CACHE_ALL_PRE;
        }
    }

    protected function getId(Request $request, $id = 'id')
    {
        $id = $request->input($id);
        if (!$id) {
            return $this->outPutError();
        }
        return $id;
    }

    protected function getUnionTablePaginate($table, $where = [], $whereBetween = [], $connection = 'care', $startDatetime = null, $endDatetime = null)
    {
        if (!$startDatetime && !$endDatetime) {
            list($startDatetime, $endDatetime) = $this->getDaterange();
        }
        $start = Carbon::parse($startDatetime);
        $end = Carbon::parse($endDatetime);

        $queries = collect();
        for ($i = $start->copy(); $i->format('Ymd') <= $end->format('Ymd'); $i->addDay()) {

            $model = DB::table("$table{$i->format('Ymd')}")
                ->where($where);
            if($whereBetween){
                $model->whereBetween($whereBetween[0], $whereBetween[1]);
            }
            $queries->push($model);
                //->whereBetween('create_time', [$start->getTimestamp(), $end->getTimestamp()]));
        }

        // 出列一张表作为union的开始
        $unionQuery = $queries->shift();

        // 循环剩下的表添加union
        $queries->each(function ($item, $key) use ($unionQuery) {
            $unionQuery->unionAll($item);
        });

        $querySql = $unionQuery->toSql();

        $paginate = DB::connection($connection)->table(DB::raw("($querySql) as a"))->mergeBindings($unionQuery)
            ->orderBy('create_time', 'desc')->paginate();
        return $paginate;
    }

    protected function getDaterange($preDay = null)
    {
        $dateRange = Input::get('daterange');
        if ($dateRange) {
            if (strpos($dateRange, '~') !== false) {
                list($startDatetime, $endDatetime) = explode('~', $dateRange);
            } else {
                list($startDatetime, $endDatetime) = explode('-', $dateRange);
            }
        } else {
            $preDay = $preDay ? : Carbon::now()->startOfDay()->toDateTimeString();
            list($startDatetime, $endDatetime) = [$preDay, Carbon::now()->endOfDay()->toDateTimeString()];
        }
        return [trim($startDatetime), trim($endDatetime)];
    }

    protected function outPut(array $data = [], $die = false, $cookie = null)
    {
        if (!isset($data['code'])) {
            $data['code'] = 200;
        }
        if ($die) {
            die(json_encode($data));
        } else {
            if($cookie){
                return response($data)->cookie($cookie);
            }
            return response($data);
        }
    }

    protected function outPutWithCookie(array $data = [],$cookie)
    {
        return $this->outPut($data, false ,$cookie);
    }

    protected function outPutSuccess()
    {
        return $this->outPut(['msg' => 'success']);
    }

    protected function outPutError($msg = 'error', array $data = [], $die = true)
    {
        if (!isset($data['code'])) {
            $data['code'] = 500;
        }
        $data['msg'] = $msg;
        return $this->outPut($data, $die);
        //die(json_encode($data));
    }

    protected function outputErrorWithDie($msg = 'error', array $data = [])
    {
        return $this->outPutError($msg, $data, true);
    }

    /**
     * 是否弹框
     * @param $url
     * @param bool $alert
     */
    protected function outPutRedirect($url, $timeout = 0)
    {
        return $this->outPut([
            'redirect' => $url,
            'timeout' => $timeout,
        ]);
    }

    protected function checkParams($check, $input, $allowEmptys = [])
    {
        $data = Helper::arrayRequiredCheck($check, $input, false, $allowEmptys);
        if ($data === false) {
            return $this->outputErrorWithDie('请填写完整信息', []);
        }
        return $data;
    }

}
