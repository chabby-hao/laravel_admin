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
use App\Models\BiFile;
use App\Models\BiUser;
use App\Models\Role;
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

        return view('admin.tool.file',[
            'datas'=>$data,
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

            $data = $this->checkParams(['filetype','filename'], $request->input(), ['filename']);

            $file = $request->file($inputFileName);
            $fileName = $data['filename'] ? : $file->getClientOriginalName();
            $filePath = "file/$fileName";

            if(!move_uploaded_file($file->getRealPath(), public_path($filePath))){
                return $this->outPutError('上传失败,请确认文件格式正确');
            }

            try {
                $model = new BiFile();
                $model->filetype = $data['filetype'];
                $model->filename = $fileName;
                $model->fileurl = asset($filePath);
                $model->save();
            }catch (\Exception $e){
                Log::error("file upload {$e->getMessage()}");
                return $this->outPutError('上传失败,请确认是否已经存在相同文件');
            }


            return $this->outputRedirectWithMsg(URL::action('Admin\ToolController@file'),'上传成功');

        }

        return view('admin.tool.fileadd');
    }

    public function fileDelete(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $id = $this->getId($request);
            $model = BiFile::find($id);
            if($model){
                //删除文件
                $path = public_path("file/" . $model->filename);
                if(file_exists($path)){
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

        if($request->isXmlHttpRequest()){
            $input = $this->checkParams(['cmd','mode','url'], $request->input());

            $hashKey = CommandLogic::cmdToHashKey($input['cmd']);
            if($input['mode'] == 0){
                //单个udid更新
                $udid = $this->getUdid($request->input('id'));
                if(!$udid){
                    return $this->outPutError('设备码有误');
                }
                $imei = DeviceLogic::getImei($udid);
                CommandLogic::cmdSet($imei, $hashKey, $input['url']);
                CommandLogic::sendCmdByUdid($udid, $input['cmd']);
            }else{
                //批量更新,用excel
                $inputFilename = 'myfile';
                if(!$request->hasFile($inputFilename)){
                    return $this->outPutError('请上传文件');
                }
                $data = Helper::readExcelFromRequest($request, $inputFilename);

                if (!$data) {
                    return $this->outPutError('请确认文件格式正确');
                }

                //取出第一行
                array_shift($data);
                $imeis = Helper::transToOneDimensionalArray($data, 0);

                foreach ($imeis as $imei){
                    if(!DeviceLogic::getUdid($imei)){
                        return $this->outPutError('imei不正确:' . $imei);
                    }
                }

                foreach ($imeis as $imei){
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
        if($request->isXmlHttpRequest()){
            $cmd = $request->input('cmd');
            $filetype = BiFile::cmdToFileType($cmd);
            $data = BiFile::whereFiletype($filetype)->get()->toArray();
            return $this->outPut(['list'=>$data]);
        }
    }

    public function exportByImsi(Request $request)
    {
        $inputFileName = 'myfile';
        if ($request->isXmlHttpRequest() && $request->hasFile($inputFileName)) {
            //上传文件
            $data = Helper::readExcelFromRequest($request, $inputFileName);

            if(!$data){
                return $this->outPutError('请确认文件格式正确');
            }

            //取出第一行
            array_shift($data);

            $imsis = Helper::transToOneDimensionalArray($data, 0);
            foreach ($imsis as &$imsi){
                $imsi = trim($imsi," '");
                $imsi = "'$imsi'";
            }
            $imsis = implode(',', $imsis);


            $rs = DB::connection('care')->select("select imei,qr,b.imsi as imsi from t_device_code a inner join `care_operate`.t_imsi_num b on a.imsi=concat('9', b.imsi) where b.imsi in ($imsis);");

            if(!$rs){
                return $this->outPutError('无数据');
            }

            $data = [];
            foreach ($rs as $row){
                $imei =  "'" . $row->imei;
                $imsi = "'" . $row->imsi;
                $deviceObj = DeviceLogic::createDevice($imei);
                $user = DeviceLogic::getAdminInfoByUdid($deviceObj->udid);
                $phone = $user ? $user->phone : '';
                $data[] = [
                    "'" . $deviceObj->udid,
                    $imsi,
                    $deviceObj->channelName,
                    $deviceObj->brandName,
                    $deviceObj->ebikeTypeName,
                    $phone,
                    $deviceObj->lastContact,
                    $deviceObj->deliverdAt,
                ];
            }

            $file = 'exportbyimsi-' . date('YmdHis');
            $path = 'export/excel/';

            Helper::exportExcel([
                '设备码',
                'IMSI',
                '渠道',
                '品牌',
                '车型',
                '设备所属账号',
                '上次在线时间',
                '出货时间'
            ], $data, $file, public_path($path), false);
            $fileUrl = asset($path . $file . '.xlsx');
            return $this->outputRedictWithoutMsg($fileUrl);

        }

        return view('admin.tool.exportbyimsi');
    }

}