<?php

namespace App\Http\Controllers\Tool;


use App\Exports\XinpuDetectExport;
use App\Http\Controllers\Controller;
use App\Libs\ErrorCode;
use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Logics\RedisLogic;
use App\Models\BiXinpuDetect;
use Illuminate\Http\Request;

class XinpuController extends Controller
{

    /**
     * 检测结果
     * @param Request $request
     */
    public function result(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            //上传检测结果
            $input = $request->input();
            $input['check_at'] = date('Y-m-d H:i:s', $input['check_time']);
            $res = BiXinpuDetect::create($input);
            if ($res) {
                return Helper::response();
            }
            return Helper::responeseError();
        }
        $date = $request->input('date');
        if ($date) {
            list($begin, $end) = explode('-', $date);
            $begin = date('Y-m-d 00:00:00', strtotime($begin));
            $end = date('Y-m-d 23:59:59', strtotime($end));
            BiXinpuDetect::whereBetween('check_at', [$begin, $end])->get();
            return (new XinpuDetectExport($begin, $end))->download('历史记录.xlsx');
        }

        return abort(403);
    }

    public function detect(Request $request)
    {

        if ($request->isXmlHttpRequest() && $request->isMethod('GET')) {

            $imei = $request->input('imei');
            $time = $request->input('time');//开始检测的时间

            $time = $time - 600;//时间放宽松

            list(, $imei) = DeviceLogic::getUdidImei($imei);
            if (!$imei) {
                return Helper::responeseError(ErrorCode::$errInvalidUdid);
            }

            /*$data = [
                'rom' => 2503,
                'mcu' => '1.2.34',
                'batConn' => mt_rand(0, 1),
                'gsm' => mt_rand(0, 1),
                'net' => mt_rand(0, 1),
                'gps' => mt_rand(0, 1),
                'vol' => mt_rand(0, 1),
                //'result' => 0,
                'result' => mt_rand(0, 1),
                'gps_text' => '(12个)',
                'gsm_text' => '(-75db/7)',
                'vol_text' => '(43.5V)',
            ];
            return Helper::response($data);*/


            $gps = DeviceLogic::getLastLocationInfo($imei);
            $gsm = DeviceLogic::getLastGsmLocationInfo($imei);
            $devData = RedisLogic::getDevDataByImei($imei);
            $zhangfeiData = RedisLogic::getZhangfeiByImei($imei);
            //$vol = DeviceLogic::getCurrentVoltage($imei);
            $vol = $zhangfeiData['batteryVoltage'];//mv

            $data = [];
            $data['rom'] = $devData['rom'] ? : null;
            $data['mcu'] = $devData['mcuVersion'] ? : null;
            $data['batConn'] = 0;
            $data['gsm'] = 0;
            $data['net'] = 0;
            $data['gps'] = 0;
            $data['vol'] = 0;
            $data['result'] = 0;


            $data['gps_text'] = '(0个)';
            $data['gsm_text'] = '(0个)';
            $data['vol_text'] = '(0V)';

            if ($this->checkGps($gps, $gsm, $time)) {
                $data['gps'] = 1;
            }
            if ($gps['time'] > $time) {
                $data['gps_text'] = '(' . max($gps['satCount'], $gsm['satCount']) . '个)';
            }

            if ($this->checkGsm($gsm, $time)) {
                $data['gsm'] = 1;
            }
            if ($gsm['time'] > $time) {
                $data['gsm_text'] = '(' . $gsm['cellTowerCount'] . '个)';
            }

            if ($this->checkBatteryId($zhangfeiData, $time)) {
                $data['net'] = 1;
                $data['batConn'] = 1;
            }
            if ($this->checkVol($vol)) {
                $data['vol_text'] = '(' . $vol / 1000 . 'V)';
                $data['vol'] = 1;
            }

            if ($data['rom'] == '2335' &&
                $data['mcu'] == '1.0.2366' &&
                $this->checkGps($gps, $gsm, $time) &&
                $this->checkGsm($gsm, $time) &&
                $this->checkBatteryId($zhangfeiData, $time) &&
                $this->checkVol($vol)
            ) {
                //检测成功
                $data['result'] = 1;
            }
            return Helper::response($data);
        }

        return view('tool.detect');
    }

    private function checkVol($vol)
    {
        //for test
        return $vol;
    }

    private function checkBatteryId($data, $time)
    {
        //for test
        if ($data['timeStamp'] > $time && preg_match('/^XPFactTest.*/', $data['batteryID'])) {
            return true;
        }
        return false;
    }

    private function checkGsm($gsm, $time)
    {
        //for test
        //基站数量大于2且主基站信号强度大于-90db判断合格；
        if ($gsm['time'] > $time && $gsm['cellTowerCount'] > 3) {
            return true;
        }
        return false;
    }

    private function checkGps($gps, $gsm, $time)
    {
        //搜星数量大于4或者完成GPS定位；
        if ($gps['time'] > $time || $gsm['satCount'] > 4) {
            return true;
        }
        return false;
    }


}