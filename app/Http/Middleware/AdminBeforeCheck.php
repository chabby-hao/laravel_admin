<?php

namespace App\Http\Middleware;

use App\Logics\FactoryLogic;
use App\Models\BiUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AdminBeforeCheck
{

    //不用登录就可以访问的路由
    protected $noLoginRoutes = ['admin-login', 'admin-logout'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {

        $a = session()->all();
        Log::debug('admin route : ' . $request->route()->getActionName());
        Log::debug('session  : ', $a);

        $routeName = $request->route()->getName();

        if (in_array($routeName, $this->noLoginRoutes)) {
            //不需要登录
            return $next($request);
        }elseif (Auth::check()) {
            // 已通过认证

            //判断权限
            //admin/role/list
            $uri = $request->route()->uri();

            $permisName = trim(substr($uri, 5), '/');

            if(empty($permisName)){
                $permisName = 'index/welcome';//默认首页
            }

            /** @var BiUser $user */
            $user = Auth::user();
            if(!$user->can($permisName)){
                if($user->hasRole(FactoryLogic::$roleName)){
                    return Redirect::action('Admin\DeliveryController@factoryPanel');
                }
                //开发阶段暂时解除权限操作
                if($request->isXmlHttpRequest()){
                    return response(['code'=>403,'msg'=>'未经授权操作']);
                }
                return abort(403,'未经授权操作');
            }

            return $next($request);
        }else{
            return Redirect::route('admin-login');
        }
    }

}
