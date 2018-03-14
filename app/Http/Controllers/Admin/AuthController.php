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
use Illuminate\Support\Facades\URL;

class AuthController extends BaseController
{

    public function login(Request $request)
    {

        if($request->isXmlHttpRequest()){
            $check = ['name','pwd'];
            $data = $this->checkParams($check, $request->input());
            $authLogic = new AuthLogic();
            if($authLogic->login($data['name'], $data['pwd'], $request->ip())){
                return $this->outPutRedirect(URL::action('Admin\IndexController@welcome'), 0);
            }
            return $this->outPutError('用户名或者密码错误');
        }

        return view('admin.auth.login');
    }

}
