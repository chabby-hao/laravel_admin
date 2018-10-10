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
use App\Logics\StatLogic;
use App\Logics\UserLogic;
use App\Models\BiBrand;
use App\Models\BiCardDatum;
use App\Models\BiCardLiangxun;
use App\Models\BiChannel;
use App\Models\BiCustomer;
use App\Models\BiDeviceType;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\BiScene;
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
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use App\Logics\FactoryLogic;
use App\Models\BiDeliveryOrder;

class MessageController extends BaseController
{



    public function list()
    {

        $imei = Input::get('imei');
        $udid = DeviceLogic::getUdid($imei);

        list($startDatetime, $endDatetime) = $this->getDaterange();

        $whereBetween = ['time', [Carbon::parse($startDatetime)->getTimestamp(), Carbon::parse($endDatetime)->getTimestamp()]];
        $paginate = TUserMsg::whereSource($udid)
            ->whereBetween($whereBetween[0], $whereBetween[1])
            ->orderByDesc('id')->paginate();


        $data = $paginate->items();

        foreach ($data as &$row) {
            $row->username = UserLogic::getPhoneByUid($row->reciever, true);
            $row->datetime = Carbon::createFromTimestamp($row->time)->toDateTimeString();
        }

        return view('admin.message.list', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($paginate),
            'udid' => $udid,
            'start' => $startDatetime,
            'end' => $endDatetime,
        ]);
    }


}