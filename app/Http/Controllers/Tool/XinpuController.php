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
            $vol = $zhangfeiData['BatteryVoltage'];//mv

            $data = [];
            $data['rom'] = 2503;
            $data['mcu'] = $devData['mcuVersion'];
            $data['batConn'] = 0;
            $data['gsm'] = 0;
            $data['net'] = 0;
            $data['gps'] = 0;
            $data['vol'] = 0;
            $data['result'] = 0;
            $data['gps_text'] = '(' . max($gps['satCount'], $gsm['satCount']) . '个)';
            $data['gsm_text'] = '(' . -$gsm['gsmStrength'] . 'db/' . $gsm['cellTowerCount'] . ')';
            $data['vol_text'] = '(' . $vol / 1000 . 'V)';

            if ($this->checkGps($gps, $gsm, $time)) {
                $data['gps'] = 1;
            }
            if ($this->checkGsm($gsm, $time)) {
                $data['gsm'] = 1;
            }

            if ($this->checkBatteryId($zhangfeiData)) {
                $data['net'] = 1;
                $data['batConn'] = 1;
            }
            if ($vol) {
                $data['vol'] = 1;
            }

            if ($this->checkGps($gps, $gsm, $time) &&
                $this->checkGsm($gsm, $time) &&
                $this->checkBatteryId($zhangfeiData) &&
                $vol
            ) {
                //检测成功
                $data['result'] = 1;
            }
            return Helper::response($data);
        }

        return view('tool.detect');
    }

    private function checkBatteryId($data)
    {
        if (preg_match('/^XPFactTest.*/', $data['batteryId'])) {
            return true;
        }
        return false;
    }

    private function checkGsm($gsm, $time)
    {
        //基站数量大于2且主基站信号强度大于-90db判断合格；
        if ($gsm['time'] > $time && $gsm['cellTowerCount'] > 2 && -$gsm['gsmStrength'] > -90) {
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