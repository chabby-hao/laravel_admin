<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{

    public function welcome()
    {
        $user = Auth::user();
        var_dump($user);exit;

        return view('admin.index.welcome');
    }

}
