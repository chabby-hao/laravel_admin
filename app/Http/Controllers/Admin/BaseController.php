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
use Illuminate\Http\Request;

class BaseController extends Controller
{

    protected function outPut(array $data = [])
    {
        $data['code'] = 200;
        header('Content-Type: application/json');
        die(json_encode($data));
    }

    protected function outPutSuccess()
    {
        $this->outPut(['msg'=>'success']);
    }

    protected function outPutError($msg, array $data = [])
    {
        if (!isset($data['code'])) {
            $data['code'] = 500;
        }
        $data['msg'] = $msg;
        die(json_encode($data));
    }

    /**
     * 是否弹框
     * @param $url
     * @param bool $alert
     */
    protected function outPutRedirect($url, $timeout = 1200)
    {
        $this->outPut([
            'redirect'=>$url,
            'timeout'=>$timeout,
        ]);
    }

    protected function checkParams($check, $input, $allowEmptys = [])
    {
        $data = Helper::arrayRequiredCheck($check, $input, false, $allowEmptys);
        if ($data === false) {
            return $this->outPutError('请填写完整信息');
        }
        return $data;
    }

}
