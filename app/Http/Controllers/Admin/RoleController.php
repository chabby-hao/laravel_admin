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
            $input = $this->getInput($request->input());

            $authLogic = new AuthLogic();

            if ($authLogic->createRole($input)) {
                return $this->outPutRedirect(URL::action('Admin\RoleController@list'));
            } else {
                return $this->outPutError('操作失败，请确认角色名不重复');
            }

        }

        return view('admin.role.add');
    }

    public function edit(Request $request)
    {

        $id = $this->getId($request);

        if ($request->isXmlHttpRequest()) {

            $input = $this->getInput($request->input());

            $authLogic = new AuthLogic();

            if ($authLogic->editRole($id, $input)) {
                return $this->outPutRedirect(URL::action('Admin\RoleController@list'));
            } else {
                return $this->outPutError('操作失败，请确认角色名不重复');
            }
        }
        return view('admin.role.edit', [
            'role' => Role::find($id),
        ]);
    }

    public function delete(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $id = $this->getId($request);
            $role = Role::findOrFail($id);
            $role->delete();
            return $this->outPutSuccess();
        }
    }

    public function getInput($input)
    {
        $input = $this->checkParams([
            'name',
            'display_name',
            'description'
        ], $input, ['display_name', 'description']);
        return $input;
    }

    public function attachPermis(Request $request)
    {

        $id = $this->getId($request);
        $role = Role::find($id);

        if ($request->isXmlHttpRequest()) {
            $data = $this->checkParams(['permis_id'], $request->input());
            $role->savePermissions($data['permis_id']);
            return $this->outPutRedirect(URL::action('Admin\RoleController@list'));
        }

        $permiss = Permission::all();

        $permisKeyByName = [];

        foreach ($permiss as $permis) {
            list($controller,) = explode('/', $permis->name);
            $permisKeyByName[$controller][] = $permis;
        }

        return view('admin.role.attach_permis', [
            'role' => $role,
            'permisMap' => $permisKeyByName,
        ]);

    }


}
