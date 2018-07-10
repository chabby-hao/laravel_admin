<?php

namespace App\Http\Middleware;

use App\Logics\FactoryLogic;
use App\Models\BiUser;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminBeforeCheck
{

    //不用登录就可以访问的路由
    protected $noLoginRoutes = ['admin-login', 'admin-logout'];

    //不需要验证权限的路由
    protected $noPermisVerify = [
        'device/searchCity',
        'brand/detail',
        'device/exportList',
        'device/map',
        'user/resetPassword',
        'tool/getFileUrl',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {

        Log::debug('user:' . Auth::user()->username . ' --- admin route : ' . $request->route()->getActionName());

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

            //无需配置权限
            if(in_array($permisName, $this->noPermisVerify)){
                return $next($request);
            }


            //本地不需要验证权限
            if(env('APP_ENV') == 'local'){
                return $next($request);
            }

            /** @var BiUser $user */
            $user = Auth::user();
            if(!$user->can($permisName)){

                //工厂跳转特殊
                if($user->hasRole(FactoryLogic::$roleName)){
                    return Redirect::action('Admin\DeliveryController@factoryPanel');
                }

                $permis = Permission::get();
                foreach ($permis as $permi){
                    if($user->can($permi->name)){
                        return Redirect::to('/admin/' . $permi->name);
                    }
                }

                if($request->isXmlHttpRequest()){
                    return response(['code'=>403,'msg'=>'未经授权操作']);
                }
                return abort(403,'未经授权操作');
            }

            return $next($request);
        }else{

            if($request->isXmlHttpRequest()){
                return response(['code'=>501,'msg'=>'登录状态过期，请重新登录']);
            }

            Session::put('lastUrl',$request->fullUrl());
            return Redirect::route('admin-login');
        }
    }

}
