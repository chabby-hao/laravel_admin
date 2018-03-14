<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;


class IndexController extends BaseController
{

    public function welcome()
    {
        return view('admin.index.welcome');
    }

}
