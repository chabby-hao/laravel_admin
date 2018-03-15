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

    protected function getId(Request $request, $id = 'id')
    {
        $id = $request->input($id);
        if(!$id){
            return $this->outPutError();
        }
        return $id;
    }

    protected function outPut(array $data = [], $die = false)
    {
        if(!isset($data['code'])){
            $data['code'] = 200;
        }
        if($die){
            die(json_encode($data));
        }else{
            return response($data);
        }
    }

    protected function outPutSuccess()
    {
        return $this->outPut(['msg'=>'success']);
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
    protected function outPutRedirect($url, $timeout = 1200)
    {
        return $this->outPut([
            'redirect'=>$url,
            'timeout'=>$timeout,
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
