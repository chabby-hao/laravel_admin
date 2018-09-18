<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 18/3/14
 * Time: 下午3:37
 */

namespace App\Http\Controllers\Admin;


use App\Libs\MyPage;
use App\Logics\DeviceLogic;
use App\Logics\OrderLogic;
use App\Models\BiBrand;
use App\Models\BiChannel;
use App\Models\BiChannelSn;
use App\Models\BiCustomer;
use App\Models\BiDeviceType;
use App\Models\BiEbikeType;
use App\Models\BiOrder;
use App\Models\BiProductType;
use App\Models\TDevice;
use App\Models\TDeviceCategoryDicNew;
use App\Models\TDeviceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ChannelController extends BaseController
{

    public function add(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $input = $this->checkParams(['channel_name','channel_remark'], $request->input(),['channel_remark']);

            if(BiChannel::whereChannelName($input['channel_name'])->first()){
                return $this->outPutError('渠道名已存在');
            }

            $model = new BiChannel();
            $model->channel_name = $input['channel_name'];
            $model->channel_remark = $input['channel_remark'];
            $model->save();

            $maxId = TDeviceCategoryDicNew::whereLevel(3)->max('channel');

            $dicNewModel = new TDeviceCategoryDicNew();
            $dicNewModel->products = 6;
            $dicNewModel->model = 'EB001B';
            $dicNewModel->channel = ++$maxId;
            $dicNewModel->type = 0;
            $dicNewModel->brand = 0;
            $dicNewModel->level = 3;
            $dicNewModel->name = $input['channel_name'];
            $dicNewModel->remark = $input['channel_remark'] ?: '';
            $dicNewModel->save();


            return $this->outputRedirectWithMsg(URL::action('Admin\ChannelController@list'), '渠道添加成功');

        }

        return view('admin.channel.add');
    }

    public function list()
    {
        $paginates = BiChannel::orderByDesc('id')->paginate();
        $data = $paginates->items();

        return view('admin.channel.list', [
            'datas' => $data,
            'page_nav' => MyPage::showPageNav($paginates),
        ]);
    }

    /**
     * 渠道关联工装号
     */
    public function channelSn(Request $request)
    {
        $id = $this->getId($request);
        $rs = BiChannelSn::whereChannelId($id)->get();


        if($request->isXmlHttpRequest()){
            $sn = $this->checkParams(['sn'], $request->input())['sn'];

            BiChannelSn::updateOrCreate([
                'sn'=>$sn,
                'channel_id'=>$id,
            ]);

            return $this->outputRedirectWithMsg($request->fullUrl(), '添加成功');
        }

        return view('admin.channel.channelsn', [
            'rs'=>$rs,
        ]);
    }

    public function detail(Request $request)
    {
        $id = $this->getId($request);

        $model = BiChannel::find($id);
        if($model){
            $rs = BiCustomer::whereChannelId($model->id)->get();
            $data = $rs->toArray();
            foreach ($rs as $row){
                $data['children'][] = $row->toArray();
            }
            return $this->outPut($data);
        }
        return $this->outPutError();
    }

}