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


class EbikeController extends BaseController
{
    public function list(Request $request)
    {
        //展示该品牌下的车型,一个品牌拥有多个车型
        if($request->isMethod('get')){
            $brand_id=$request->input('id');
            $brand_name=DB::table('bi_brands')->where('id',$brand_id)->value('brand_name');
            $ebike=DB::table('bi_ebike_type')->where('brand_id',$brand_id)->get()->toArray();
            return view('admin.ebike.list',['datas'=>$ebike,'brandname'=>$brand_name]);
        }
    }

    public function add(Request $request)
    {
        if($request->isMethod('get')){
            //查询出所有的品牌
            $brand=DB::table('bi_brands')->get()->toArray();
            //var_dump($channel);exit;
            return view('admin.ebike.add',['brand'=>$brand]);
        }

        if($request->isMethod('post')){
            $brand_id=$request->input('brand_id');
            $ebike_name=$request->input('ebike_name');
            $ebike_remark=$request->input('ebike_remark');
            if(DB::table('bi_ebike_type')->insert(['brand_id'=>$brand_id,'ebike_name'=>$ebike_name,'ebike_remark'=>$ebike_remark])){
                    return $this->outPutRedirect(URL::action('Admin\EbikeController@list',['id'=>$brand_id]));
                }else{
                    return $this->outPutError('添加失败');
            }

        }
    }

    //车型修改
    public function edit(Request $request)
    {
        if($request->isMethod('get')){
            $ebike_id=$request->input('id');
            $ebike=DB::table('bi_ebike_type')->leftjoin('bi_brands','brand_id','=','bi_brands.id')->where('bi_ebike_type.id',$ebike_id)->get()->toArray()  ;

            $brand=DB::table('bi_brands')->get()->toArray();
            return view('admin.ebike.edit',['ebike'=>$ebike,'brand'=>$brand]);
        }

        if($request->isMethod('post')){
            $ebike_id=$request->input('id');
            $brand_id=$request->input('brand_id');
            $ebike_name=$request->input('ebike_name');
            $ebike_remark=$request->input('ebike_remark');

            if(DB::table('bi_ebike_type')->where('id',$ebike_id)->update(['brand_id'=>$brand_id,'ebike_name'=>$ebike_name,'ebike_remark'=>$ebike_remark])){
                return $this->outPutRedirect(URL::action('Admin\EbikeController@list',['id'=>$brand_id]));
            }else{
                return $this->outPutError('无修改信息');
            }
        }
    }



}
