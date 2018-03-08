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
use App\Models\BiUser;
use App\Models\Feedbacks;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function list()
    {

        $users = BiUser::orderByDesc('id')->paginate();
        $usersList = $users->items();
        /** @var User $user */
        foreach ($usersList as $user){

        }

        return view('admin.user.list',[
            'users'=>$usersList,
            'page_nav'=>MyPage::showPageNav($users),
        ]);
    }

    public function add(Request $request)
    {
        if($request->isXmlHttpRequest()){

        }

        return view('admin.user.add');
    }

    public function feedback()
    {

        $feedbacks = Feedbacks::join('users',function($join){
            $join->on('users.id','=','user_id');
        })->select(['feedbacks.*','users.phone'])->orderBy('id')->paginate();

        return view('admin.user.feedbacks',[
            'feedbacks'=>$feedbacks->items(),
            'page_nav'=>MyPage::showPageNav($feedbacks),
        ]);

    }

}
