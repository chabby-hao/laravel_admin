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
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class RoleController extends BaseController
{
    public function list()
    {

        $paginate = Role::orderByDesc('id')->paginate();

        return view('admin.role.list', [
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

            if($authLogic->createRole($intput)){
                return $this->outPutRedirect(URL::action('Admin\RoleController@list'));
            }else{
                return $this->outPutError('操作失败，请确认角色名不重复');
            }

        }

        return view('admin.role.add');
    }

    public function attachPermis(Request $request)
    {
        $id = $request->input('id');
        if(!$id){
            return $this->outPutError();
        }

        $role = Role::find($id);

        if($request->isXmlHttpRequest()){
            $data = $this->checkParams(['permis_id'],$request->input());
            $role->savePermissions($data['permis_id']);
            return $this->outPutRedirect(URL::action('Admin\RoleController@list'));
        }

        $permiss = Permission::all();

        $permisKeyByName = [];

        foreach ($permiss as $permis){
            list($controller, ) = explode('/',$permis->name);
            $permisKeyByName[$controller][] = $permis;
        }

        return view('admin.role.attach_permis',[
            'role'=>$role,
            'permisMap'=>$permisKeyByName,
        ]);

    }


}
