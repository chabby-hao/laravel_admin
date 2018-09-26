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


class ScenesController extends BaseController
{
    public function list(Request $request)
    {
        //展示该客户下的场景,一个客户拥有多个场景
        if($request->isMethod('get')){
            $customer_id=$request->input('id');
            $customer_name=DB::table('bi_customers')->where('id',$customer_id)->value('customer_name');
            $scenes=DB::table('bi_scenes')->where('customer_id',$customer_id)->get()->toArray();
            return view('admin.scenes.list',['datas'=>$scenes,'customer_name'=>$customer_name]);
        }
    }

    public function add(Request $request)
    {
        if($request->isMethod('get')){
            //查询出所有的客户
            $customer=DB::table('bi_customers')->get()->toArray();
            //var_dump($customer);exit;
            return view('admin.scenes.add',['customer'=>$customer]);
        }

        if($request->isMethod('post')){

            $customer_id=$request->input('customer_id');
            $scenes_name=$request->input('scenes_name');
            $scenes_remark=$request->input('scenes_remark');
            //获取到当前客户下有几个场景
            $sce=DB::table('bi_scenes')->where('customer_id',$customer_id)->orderBy('ev_model',desc)->value('ev_model');
            //return $sce;
            if($sce){
                $ev_model=$sce+1;
            }else{
                $ev_model=1;
            }
            //获取到客户名称
            $customer_name=DB::table('bi_customers')->where('id',$customer_id)->value('customer_name');

            if(DB::table('bi_scenes')->insert(['customer_id'=>$customer_id,'scenes_name'=>$scenes_name,'scenes_remark'=>$scenes_remark,'ev_model'=>$ev_model])){
                //同时往老版本库插入数据
                //products不变,model不变,channel变成自己的渠道id,type不变,brand不变,ev_model累加,rank不变
                //通过新版本的客户名称查到老版本的渠道id,type,brand
                $dicNewModel = new TDeviceCategoryDicNew();
                //return $dicNewModel->scenesadd($customer_name,$scenes_name,$scenes_remark);
                if($dicNewModel->scenesadd($customer_name,$scenes_name,$scenes_remark)){
                    return $this->outPutRedirect(URL::action('Admin\ScenesController@list',['id'=>$customer_id]));
                }
                return $this->outPutError('添加失败');
            }else{
                return $this->outPutError('添加失败');
            }
        }
    }

    //场景修改
    public function edit(Request $request)
    {
        if($request->isMethod('get')){
            $scenes_id=$request->input('id');
            $scenes=DB::table('bi_scenes')->leftjoin('bi_customers','customer_id','=','bi_customers.id')->where('bi_scenes.id',$scenes_id)->get()->toArray()  ;

            $customer=DB::table('bi_customers')->get()->toArray();
            return view('admin.scenes.edit',['scenes'=>$scenes,'customer'=>$customer]);
        }

        if($request->isMethod('post')){
            $sce_id=$request->input('id');
            $scenes=$request->input();
            //得到修改之前场景名称
            $sce_name=DB::table('bi_scenes')->where('id',$sce_id)->value('scenes_name');
            //客户id,场景名称/备注
            $customer_id=$scenes['customer_id'];
            //得到修改后的客户名称
           // $cuss_name=DB::table('bi_customers')->where('id',$customer_id)->value('customer_name');
            $scenes_name=$scenes['scenes_name'];
            $scenes_remark=$scenes['scenes_remark'];
//            //拿到修改后的客户id去查一下当前客户下有没有场景
//            $sce=DB::table('bi_scenes')->where('customer_id',$customer_id)->orderBy('ev_model','desc')->value('ev_model');
//            if($sce){
//                $ev_model=$sce+1;
//            }else{
//                $ev_model=1;
//            }

            if(DB::table('bi_scenes')->where('id',$sce_id)->update(['scenes_name'=>$scenes_name,'scenes_remark'=>$scenes_remark])){
                //修改老版本库的数据,先得到修改之前的场景名称
                $dicNewModel = new TDeviceCategoryDicNew();
                if($dicNewModel->scenesedit($sce_name,$scenes_name,$scenes_remark)){
                    return $this->outPutRedirect(URL::action('Admin\ScenesController@list',['id'=>$customer_id]));
                }else{
                    return $this->outPutError('修改失败,请检查网络设置');
                }
            }else{
                return $this->outPutError('无修改信息');
            }
        }
    }


}
