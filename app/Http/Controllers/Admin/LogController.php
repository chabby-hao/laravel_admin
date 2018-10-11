<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;


use App\Libs\Helper;
use App\Libs\MyPage;
use App\Logics\AuthLogic;
use App\Logics\CommandLogic;
use App\Logics\DeviceLogic;
use App\Logics\LockLogic;
use App\Logics\RedisLogic;
use App\Logics\UserLogic;
use App\Models\BiFile;
use App\Models\BiOperationLog;
use App\Models\BiUser;
use App\Models\Role;
use App\Models\TDeviceCode;
use App\Models\TPayment;
use App\Models\TUserDevice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class LogController extends BaseController
{

    public function list()
    {

        list($startDatetime, $endDatetime) = $this->getDaterange();

        $whereBetween = ['time', [Carbon::parse($startDatetime)->getTimestamp(), Carbon::parse($endDatetime)->getTimestamp()]];
        $paginate = BiOperationLog::whereBetween($whereBetween[0], $whereBetween[1])
            ->orderByDesc('id')->paginate();


        $data = $paginate->items();

        foreach ($data as &$row) {

        }

        return view('admin.log.list', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($paginate),
            'start' => $startDatetime,
            'end' => $endDatetime,
        ]);
    }


}