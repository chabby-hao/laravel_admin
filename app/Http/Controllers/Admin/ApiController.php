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
use App\Models\BiChannelSecret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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

        if($request->isXmlHttpRequest()){
            $data = $this->checkParams(['channel_id', 'channel_name'], $request->input());

            $data['secret'] = Helper::getRandStr(24);

            try{
                BiChannelSecret::create($data);
            }catch (\Exception $e){
                return $this->outputErrorWithDie($e->getMessage());
            }

            return $this->outputRedirectWithMsg(URL::action('Admin\ApiController@channelKeyList'), '添加成功');
        }

        return view('admin.api.channelkeyadd');
    }

}