<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;


use App\Libs\Helper;
use App\Libs\MyPage;
use App\Logics\AuthLogic;
use App\Models\BiUser;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class UserController extends BaseController
{

    public function resetPassword(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            //修改密码
            $data = $this->checkParams(['password_old', 'password', 'password_confirm'], $request->input());
            if ($data['password'] !== $data['password_confirm']) {
                return $this->outPutError('两次密码输入不一致');
            }
            $userId = Auth::id();
            $user = Auth::user();
            if (!Hash::check($data['password_old'], $user->getAuthPassword())) {
                return $this->outPutError('旧密码输入不正确');
            }

            $authLogic = new AuthLogic();
            if ($authLogic->resetPassword($userId, $data['password'])) {
                return $this->outputRedirectWithMsg(URL::action('Admin\IndexController@welcome'),'修改成功');
            }
            return $this->outPutError('修改失败，请确认旧密码输入正确');
        }

        return view('admin.user.resetpassword');
    }

    public function list()
    {

        $users = BiUser::join('role_user', 'id', '=', 'user_id')->orderByDesc('id')->paginate();
        $usersList = $users->items();

        foreach ($usersList as $user) {

        }

        return view('admin.user.list', [
            'users' => $usersList,
            'page_nav' => MyPage::showPageNav($users),
        ]);
    }

    public function add(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $input = $this->getFilterInput($request->input());
            $authLogic = new AuthLogic();
            if ($authLogic->createUser($input)) {
                return $this->outPutRedirect(URL::action('Admin\UserController@list'));
            }
            return $this->outPutError('添加失败,请确认是否有重复的账号名称');
        }

        return view('admin.user.add');
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return $this->outPutError();
        }

        if ($request->isXmlHttpRequest()) {
            $input = $this->getFilterInput($request->input(), false);
            $authLogic = new AuthLogic();
            if ($authLogic->editUser($id, $input)) {
                return $this->outPutRedirect(URL::action('Admin\UserController@list'));
            }
            return $this->outPutError('修改失败,请确认信息正确');
        }

        return view('admin.user.edit', [
            'user' => BiUser::getUserWithRole($id),
        ]);

    }

    private function getFilterInput($input, $needPwd = true)
    {
        $arrCheck = ['username',
            //'password',
            //'password_confirm',
            'user_type',
            'email',
            'brand_id',
            'channel_id',
            'role_id',
            'nickname'
        ];
        if ($needPwd) {
            $arrCheck[] = 'password';
            $arrCheck[] = 'password_confirm';
        }
        if (!$input = Helper::arrayRequiredCheck($arrCheck, $input, false, ['email', 'brand_id', 'channel_id', 'nickname'])) {
            return $this->outPutError('信息不完整');
        }
        if ($needPwd && ($input['password'] !== $input['password_confirm'])) {
            return $this->outPutError('两次密码不一致');
        }


        if ($input['user_type'] == BiUser::USER_TYPE_ALL) {
            $input['type_id'] = 0;
        } elseif ($input['user_type'] == BiUser::USER_TYPE_CHANNEL && $input['channel_id']) {
            $input['type_id'] = $input['channel_id'];
        } elseif ($input['user_type'] == BiUser::USER_TYPE_BRAND && $input['brand_id']) {
            $input['type_id'] = $input['brand_id'];
        } else {
            return $this->outPutError('信息有误，请确认填写正确');
        }
        return $input;
    }

    public function delete(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $id = $this->getId($request);
            $user = BiUser::findOrFail($id);
            $user->delete();
            return $this->outPutSuccess();
        }
    }

    /**
     * 用户分配角色
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function attachRole(Request $request)
    {

        $id = $request->input('id');

        if (!$id) {
            return $this->outPutError();
        }
        $user = BiUser::find($id);

        if ($request->isXmlHttpRequest()) {
            $roleId = $this->checkParams(['role_id'], $request->input())['role_id'];
            //$user->roles()->detach();
            $user->roles()->sync([$roleId]);
            return $this->outPutRedirect(URL::action('Admin\UserController@list'));
        }

        $roles = Role::all();

        return view('admin.user.attach_role', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

}