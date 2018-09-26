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
use App\Models\TDeviceCategoryDicNew;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class CustomerController extends BaseController
{
    public function list(Request $request)
    {
        //展示该渠道下的客户,一个渠道拥有多个客户
        if($request->isMethod('get')){
            $channel_id=$request->input('id');
            $channel_name=DB::table('bi_channels')->where('id',$channel_id)->value('channel_name');
            $customer=DB::table('bi_customers')->where('channel_id',$channel_id)->get()->toArray();
            return view('admin.customer.list',['datas'=>$customer,'channelname'=>$channel_name]);
        }
    }

    public function add(Request $request)
    {
        if($request->isMethod('get')){
            //查询出所有的渠道
            $channel=DB::table('bi_channels')->get()->toArray();
            //var_dump($channel);exit;
            return view('admin.customer.add',['channel'=>$channel]);
        }

        if($request->isMethod('post')){
            $channel_id=$request->input('channel_id');
            $customer_name=$request->input('customer_name');
            $customer_remark=$request->input('customer_remark');
            //获取到渠道名称
            $channel_name=DB::table('bi_channels')->where('id',$channel_id)->value('channel_name');

            if(DB::table('bi_customers')->insert(['channel_id'=>$channel_id,'customer_name'=>$customer_name,'customer_remark'=>$customer_remark])){
                //同时往老版本库插入数据
                //products不变,model不变,channel变成自己的渠道id,type要累加,brand要累加,ev_model不变,rank不变
                //先通过新版本的渠道名称查到老版本的渠道id,再新增数据
                $dicNewModel = new TDeviceCategoryDicNew();
                //return $dicNewModel->customeradd($channel_name,$customer_name,$customer_remark);
                if($dicNewModel->customeradd($channel_name,$customer_name,$customer_remark)){
                    return $this->outPutRedirect(URL::action('Admin\CustomerController@list',['id'=>$channel_id]));
                }
                return $this->outPutError('添加失败');
            }else{
                return $this->outPutError('添加失败');
            }
        }
    }
    //客户修改
    public function edit(Request $request)
    {
        if($request->isMethod('get')){
            $customer_id=$request->input('id');
            $customer=DB::table('bi_customers')->leftjoin('bi_channels','channel_id','=','bi_channels.id')->where('bi_customers.id',$customer_id)->get()->toArray()  ;

            $channel=DB::table('bi_channels')->get()->toArray();
            return view('admin.customer.edit',['customer'=>$customer,'channel'=>$channel]);
        }

        if($request->isMethod('post')){
            $cus_id=$request->input('id');
            $cus=$request->input();
            //得到修改之前客户名称
            $cuss_name=DB::table('bi_customers')->where('id',$cus_id)->value('customer_name');
            //得到修改后的渠道id,客户名称/备注
            $channel_id=$cus['channel_id'];
            $customer_name=$cus['customer_name'];
            $customer_remark=$cus['customer_remark'];
            if(DB::table('bi_customers')->where('id',$cus_id)->update(['channel_id'=>$channel_id,'customer_name'=>$customer_name,'customer_remark'=>$customer_remark])){
                //修改老版本库的数据,先得到修改之前的渠道名称
                $dicNewModel = new TDeviceCategoryDicNew();
                if($dicNewModel->custroedit($cuss_name,$channel_id,$customer_name,$customer_remark)){
                    return $this->outPutRedirect(URL::action('Admin\CustomerController@list',['id'=>$channel_id]));
                }else{
                    return $this->outPutError('修改失败,请检查网络设置');
                }
            }else{
                return $this->outPutError('无修改信息');
            }
        }
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


}
