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
use App\Logics\LocationLogic;
use App\Logics\MileageLogic;
use App\Logics\MsgLogic;
use App\Logics\RedisLogic;
use App\Models\BiBrand;
use App\Models\BiBreakRule;
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

class BreakRuleController extends BaseController
{

    public function list(Request $request)
    {

        $where = [];
        if ($request->input('lpn')) {
            $where['lpn'] = $request->input('lpn');
        }
        if ($request->input('car_username')) {
            $where['car_username'] = $request->input('car_username');
        }
        if ($request->input('car_phone')) {
            $where['car_phone'] = $request->input('car_phone');
        }
        if ($request->input('violation_type')) {
            $where['violation_type'] = $request->input('violation_type');
        }

        $model = BiBreakRule::where($where);

        $dateRange = $this->getDaterange();
        if ($request->input('daterange')) {
            $model->whereBetween('violation_time', $dateRange);
        }

        $paginate = $model->orderByDesc('id')->paginate();

        return view('admin.breakrule.breakrule', [
            'datas' => $paginate->items(),
            'page_nav' => MyPage::showPageNav($paginate),
            'start'=>$dateRange[0],
            'end'=>$dateRange[1],
        ]);

    }

}