<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;


use App\Libs\Helper;
use App\Libs\IntHelper;
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

class ToolController extends BaseController
{


    /**
     * 升级文件管理
     */
    public function file()
    {
        $paginates = BiFile::orderByDesc('id')->paginate();
        $data = $paginates->items();

        return view('admin.tool.file', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($paginates),
        ]);
    }

    /**
     * 文件新增
     */
    public function fileAdd(Request $request)
    {

        $inputFileName = 'myfile';
        if ($request->isXmlHttpRequest() && $request->hasFile($inputFileName)) {
            //上传文件

            $data = $this->checkParams(['filetype', 'filename'], $request->input(), ['filename']);

            $file = $request->file($inputFileName);
            $fileName = $data['filename'] ?: $file->getClientOriginalName();
            $filePath = "file/$fileName";

            if (!move_uploaded_file($file->getRealPath(), public_path($filePath))) {
                return $this->outPutError('上传失败,请确认文件格式正确');
            }

            try {
                $model = new BiFile();
                $model->filetype = $data['filetype'];
                $model->filename = $fileName;
                $model->fileurl = asset($filePath);
                $model->save();
            } catch (\Exception $e) {
                Log::error("file upload {$e->getMessage()}");
                return $this->outPutError('上传失败,请确认是否已经存在相同文件');
            }


            return $this->outputRedirectWithMsg(URL::action('Admin\ToolController@file'), '上传成功');

        }

        return view('admin.tool.fileadd');
    }

    public function fileDelete(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $id = $this->getId($request);
            $model = BiFile::find($id);
            if ($model) {
                //删除文件
                $path = public_path("file/" . $model->filename);
                if (file_exists($path)) {
                    unlink($path);
                }
                $model->delete();
            }
            return $this->outPutSuccess();
        }

    }

    /**
     * 声音文件更新
     */
    public function romUpdate(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $input = $this->checkParams(['cmd', 'mode', 'url'], $request->input());

            $hashKey = CommandLogic::cmdToHashKey($input['cmd']);
            if ($input['mode'] == 0) {
                //单个udid更新
                $udid = $this->getUdid($request->input('id'));
                if (!$udid) {
                    return $this->outPutError('设备码有误');
                }
                $imei = DeviceLogic::getImei($udid);
                CommandLogic::cmdSet($imei, $hashKey, $input['url']);
                CommandLogic::sendCmdByUdid($udid, $input['cmd']);
            } else {
                //批量更新,用excel
                $inputFilename = 'myfile';
                if (!$request->hasFile($inputFilename)) {
                    return $this->outPutError('请上传文件');
                }
                $data = Helper::readExcelFromRequest($request, $inputFilename);

                if (!$data) {
                    return $this->outPutError('请确认文件格式正确');
                }

                //取出第一行
                array_shift($data);
                $imeis = Helper::transToOneDimensionalArray($data, 0);

                foreach ($imeis as $imei) {
                    if (!DeviceLogic::getUdid($imei)) {
                        return $this->outPutError('imei不正确:' . $imei);
                    }
                }

                foreach ($imeis as $imei) {
                    CommandLogic::cmdSet($imei, $hashKey, $input['url']);
                    CommandLogic::sendCmd($imei, $input['cmd']);
                }
            }

            return $this->outputWithMsg('升级命令下发成功');
        }


        return view('admin.tool.romupdate');
    }

    public function getFileUrl(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $cmd = $request->input('cmd');
            $filetype = BiFile::cmdToFileType($cmd);
            $data = BiFile::whereFiletype($filetype)->get()->toArray();
            return $this->outPut(['list' => $data]);
        }
    }

    public function exportByImsi(Request $request)
    {
        $inputFileName = 'myfile';
        if ($request->isXmlHttpRequest() && $request->hasFile($inputFileName)) {
            //上传文件
            $data = Helper::readExcelFromRequest($request, $inputFileName);

            if (!$data) {
                return $this->outPutError('请确认文件格式正确');
            }

            //取出第一行
            array_shift($data);

            $imsis = Helper::transToOneDimensionalArray($data, 0);
            foreach ($imsis as $k => &$imsi) {
                $imsi = trim($imsi, " '`");
                if(!$imsi){
                    unset($imsis[$k]);
                }
                $imsi = "'$imsi'";
            }
            $imsis = implode(',', $imsis);


            $rs = DB::connection('care')->select("select num_106,imei,qr,substr(a.imsi,2) as imsi from t_device_code a left join `care_operate`.t_imsi_num b on a.imsi=concat('9', b.imsi) where substr(a.imsi,2) in ($imsis);");
            $rs or $rs = DB::connection('care')->select("select num_106,imei,qr,substr(a.imsi,2) as imsi from t_device_code a left join `care_operate`.t_imsi_num b on a.imsi=concat('9', b.imsi) where num_106 in ($imsis);");
            $rs or $rs = DB::connection('care')->select("select num_106,imei,qr,substr(a.imsi,2) as imsi from t_device_code a left join `care_operate`.t_imsi_num b on a.imsi=concat('9', b.imsi) where imei in ($imsis);");

            if (!$rs) {
                return $this->outPutError('无数据');
            }

            $data = [];
            foreach ($rs as $row) {
                $imei = $row->imei;
                $imsi = $row->imsi;
                $udid = $row->qr;
                $num106 = $row->num_106;
                $deviceObj = DeviceLogic::createDevice($imei);
                $user = DeviceLogic::getAdminInfoByUdid($deviceObj->udid);
                $phone = $user ? $user->phone : '';
                $rom = DeviceLogic::getRomVersionByUdid($deviceObj->udid);
                $data[] = [
                    "'" . $num106,
                    "'" . $udid,
                    "'" . $imsi,
                    DeviceLogic::getChannelName($imei),
                    DeviceLogic::getBrandName($imei),
                    DeviceLogic::getEbikeTypeNameByUdid($udid),
                    "'" . $phone,
                    DeviceLogic::getLastContact($imei),
                    DeviceLogic::getDeliverdAtByUdid($udid),
                    $rom,
                ];
            }

            $file = 'exportbyimsi-' . date('YmdHis');
            $path = 'export/excel/';

            Helper::exportExcel([
                '移动卡号',
                '设备码',
                'IMSI',
                '渠道',
                '品牌',
                '车型',
                '设备所属账号',
                '上次在线时间',
                '出货时间',
                '固件版本',
            ], $data, $file, public_path($path), false);
            $fileUrl = asset($path . $file . '.xlsx');
            return $this->outputRedictWithoutMsg($fileUrl);

        }

        return view('admin.tool.exportbyimsi');
    }

    public function imsiRepeat(Request $request)
    {
        $id = $request->input('id');

        if($id){
            $model = TDeviceCode::orWhere([
                'imei'=>$id,
            ])->orWhere([
                'imsi'=>$id,
            ]);
            $items = $model->get();
        }

        return view('admin.tool.imsirepeat', [
            'datas' => isset($items) ? $items : [],
        ]);
    }

    public function deviceToChannel(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $input = $this->checkParams(['channel_id','customer_id','scene_id', 'mode','way','brand_id','ebike_type_id','battery_type'], $request->input(),['scene_id','brand_id','ebike_type_id','battery_type']);

            if ($input['mode'] == 0) {
                //单个udid
                $udid = $this->getUdid($request->input('id'));
                if (!$udid) {
                    return $this->outPutError('设备码有误');
                }
                $imei = DeviceLogic::getImei($udid);
                $imeis = [$imei];
            } else {
                //批量
                $inputFilename = 'myfile';
                if (!$request->hasFile($inputFilename)) {
                    return $this->outPutError('请上传文件');
                }
                $data = Helper::readExcelFromRequest($request, $inputFilename);

                if (!$data) {
                    return $this->outPutError('请确认文件格式正确');
                }

                //取出第一行
                array_shift($data);
                $imeis = Helper::transToOneDimensionalArray($data, 0);

                foreach ($imeis as $imei) {
                    if (!DeviceLogic::getUdid($imei)) {
                        return $this->outPutError('imei不正确:' . $imei);
                    }
                }
            }

            foreach ($imeis as $imei){
                DeviceLogic::deviceToChannel($imei, $input['channel_id'], $input['customer_id'], $input['scene_id'], $input['brand_id'], $input['ebike_type_id']);
                if(!$input['way']){
                    DeviceLogic::resetDevice($imei);
                }
                if($input['battery_type']){
                    RedisLogic::hSet('battery_type', $imei, $input['battery_type'], 1);
                }
            }

            return $this->outputWithMsg('操作成功');
        }


        return view('admin.tool.devicetochannel');
    }

    public function cmdSend(Request $request)
    {

        if($request->isXmlHttpRequest()){
            $input = $this->checkParams(['id','cmd'], $request->input());
            if($udid = $this->getUdid($input['id'])){
                CommandLogic::sendCmdByUdid($udid, $input['cmd']);
                BiOperationLog::addLog(BiOperationLog::TYPE_TOOL_DEVICE_CMD_SEND, "设备码[{$udid}]下发命令[{$input['cmd']}]");
                return $this->outPutSuccess();
            }
            return $this->outPutError('数据有误');
        }

        return view('admin.tool.cmdsend');
    }

    public function userDeviceDel(Request $request)
    {

        if($request->isXmlHttpRequest()){
            if(!$udid = $this->getUdid($this->getId($request))){
                return $this->outPutError('设备码有误');
            }

            TUserDevice::whereUdid($udid)->delete();

            BiOperationLog::addLog(BiOperationLog::TYPE_TOOL_USER_DEVICE_DEL, "设备码[{$udid}]清空用户");

            return $this->outPutSuccess();
        }

        return view('admin.tool.userdevicedel');
    }

    public function userDeviceAdd(Request $request)
    {

        if($request->isXmlHttpRequest()){
            if(!$udid = $this->getUdid($this->getId($request))){
                return $this->outPutError('设备码有误');
            }

            $input = $this->checkParams(['phone','owner'], $request->input());

            if(!$uid = UserLogic::getUidByPhone($input['phone'])){
                return $this->outPutError('用户不存在');
            }

            if($input['owner'] == TUserDevice::USER_TYPE_OWNER){
                TUserDevice::whereUdid($udid)->whereOwner(TUserDevice::USER_TYPE_OWNER)->delete();
            }

            TUserDevice::updateOrCreate([
                'uid'=>$uid,
                'udid'=>$udid,
            ],[
                'owner'=>$input['owner'],
                'type'=>0,
            ]);

            $trans = TUserDevice::getUserTypeMap($input['owner']);

            BiOperationLog::addLog(BiOperationLog::TYPE_TOOL_USER_DEVICE_ADD, "设备码[{$udid}]添加[{$trans}][{$input['phone']}]");

            return $this->outPutSuccess();
        }

        return view('admin.tool.userdeviceadd');
    }

    public function deviceExpireModify(Request $request)
    {
        if($request->isXmlHttpRequest()){
            if(!$udid = $this->getUdid($this->getId($request))){
                return $this->outPutError('设备码有误');
            }

            if(!$model = TPayment::find($udid)){
                return $this->outPutError('设备未激活');
            }

            $date = $this->checkParams(['date'], $request->input())['date'];
            $time = Carbon::parse($date)->getTimestamp();
            $model->expire = $time;
            $model->save();

            BiOperationLog::addLog(BiOperationLog::TYPE_TOOL_DEVICE_EXPIRE_MODIFY, "设备码[{$udid}]修改有效期至[{$date}]");

            return $this->outPutSuccess();
        }

        return view('admin.tool.deviceexpiremodify');
    }

    public function lock(Request $request)
    {
        if($request->isXmlHttpRequest()){
            if(!$udid = $this->getUdid($this->getId($request))){
                return $this->outPutError('设备码有误');
            }
            $lock = $this->checkParams(['lock'],$request->input())['lock'];

            if(!LockLogic::lock($udid, $lock,  Auth::user()->username)){
                return $this->outPutError('操作失败，请联系管理员');
            }
            return $this->outPutSuccess();
        }

        return view('admin.tool.lock');
    }

    public function configShow(Request $request)
    {
        if($request->isXmlHttpRequest() || true){
            $id = $request->input('id');
            $udid = $this->getUdid($id);
            $imei = DeviceLogic::getImei($udid);

            $imei = '357550110389790';

            $devRecordCfg = RedisLogic::getDevRecordConfig($imei);
            $devSendCfg = RedisLogic::getDevSendConfig($imei);

            $recordConfig = [];
            $sendConfig = [];

            foreach ($devRecordCfg as $k=>$v){
                $v = IntHelper::uInt($v);
                $recordConfig[] = [
                    'id'=>$k,
                    'value'=>$v,
                ];
            }

            foreach ($devSendCfg as $k=>$v){
                $v = IntHelper::uInt($v);
                $sendConfig[] = [
                    'id'=>$k,
                    'value'=>$v,
                ];
            }



        }

        return view('admin.tool.configshow', [
            'recordConfig'=>$recordConfig,
            'sendConfig'=>$sendConfig,
        ]);

    }

    public function configSet(Request $request)
    {

        $imei = $request->input('imei');
        if($request->isXmlHttpRequest()){
            $udid = DeviceLogic::getUdid($imei);

        }

        return view('admin.tool.configset',[
            'udid'=>$udid,
        ]);

    }

}