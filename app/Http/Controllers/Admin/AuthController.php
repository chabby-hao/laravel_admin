<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;


use App\Libs\MyPage;
use App\Logics\AuthLogic;
use App\Models\BiUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AuthController extends BaseController
{

    public function login(Request $request)
    {

        $preUrl = Session::get('lastUrl');
        if($request->isXmlHttpRequest()){
            $check = ['name','pwd'];
            $data = $this->checkParams($check, $request->input());
            $authLogic = new AuthLogic();
            if($authLogic->login($data['name'], $data['pwd'], $request->ip())){
                if($preUrl){
                    Session::remove('lastUrl');
                    return $this->outputRedictWithoutMsg($preUrl);
                }
                return $this->outputRedictWithoutMsg(URL::action('Admin\IndexController@welcome'));
            }
            return $this->outPutError('用户名或者密码错误');
        }

        return view('index');

        //return view('admin.auth.login');
    }

}
