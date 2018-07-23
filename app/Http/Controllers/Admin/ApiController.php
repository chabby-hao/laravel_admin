<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;

use App\Libs\MyPage;
use App\Models\BiChannelSecret;
use Illuminate\Http\Request;

class ApiController extends BaseController
{

    public function channelKeyList()
    {
        $paginates = BiChannelSecret::orderByDesc('id')->paginate();
        $data = $paginates->items();

        return view('admin.api.channelkeylist', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($paginates),
        ]);
    }

    public function channelKeyAdd(Request $request)
    {

        $data = $this->checkParams(['channel_id', 'channel_name'], $request->input());

        $model = BiChannelSecret::create($data);
        if($model){
            return $this->outputRedirectWithMsg(URL::action('Admin\ApiController@channelKeyList'), '添加成功');
        }

        return view('admin.api.channelkeyadd');
    }

}