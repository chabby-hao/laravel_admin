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
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PermisController extends BaseController
{
    public function list()
    {

        $paginate = Permission::orderByDesc('id')->paginate();

        return view('admin.permis.list', [
            'datas' => $paginate->items(),
            'page_nav' => MyPage::showPageNav($paginate),
        ]);
    }

    public function add(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            //添加用户
            $intput = $this->checkParams([
                'name',
                'display_name',
                'description'
            ], $request->input(), ['display_name', 'description']);

            $authLogic = new AuthLogic();

            if($authLogic->createPermis($intput)){
                return $this->outPutRedirect(URL::action('Admin\PermisController@list'));
            }else{
                return $this->outPutError('操作失败，请确认权限名不重复');
            }

        }

        return view('admin.permis.add');
    }


}
