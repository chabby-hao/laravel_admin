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
use App\Models\BiEbikeType;
use App\Models\BiOrder;
use App\Models\TDevice;
use App\Models\TDeviceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class BrandController extends BaseController
{

    public function detail(Request $request)
    {
        $id = $this->getId($request);

        $brand = BiBrand::find($id);
        if($brand){
            $ebtypes = BiEbikeType::whereBrandId($brand->id)->get();
            $data = $brand->toArray();
            foreach ($ebtypes as $ebtype){
                $data['ebType'][] = $ebtype->toArray();
            }
            return $this->outPut($data);
        }
        return $this->outPutError();
    }

    public function list(Request $request){

        $paginates=DB::table('bi_brands')->orderBy('id','desc')->paginate();
        $data = $paginates->items();

        return view('admin.brand.list',
            ['datas'=>$data,
             'page_nav' => MyPage::showPageNav($paginates)
            ]);
    }

    public function add(Request $request){
        if($request->isMethod('get')){
            return view('admin.brand.add');
        }

        if($request->isMethod('post')){
            $brand_name=$request->input('brand_name');
            $brand_remark=$request->input('brand_remark');
            if(DB::table('bi_brands')->insert(['brand_name'=>$brand_name,'brand_remark'=>$brand_remark])){
                return $this->outPutRedirect(URL::action('Admin\BrandController@list'));
            }else{
                return $this->outPutError('添加失败');
            }
        }

    }

    public function edit(Request $request){
        if($request->isMethod('get')){
            $brand_id=$request->input('id');
            $brand=DB::table('bi_brands')->where('id',$brand_id)->first();
            return view('admin.brand.edit',['datas'=>$brand]);
        }

        if($request->isMethod('post')){
            $id=$request->input('id');
            $brand_name=$request->input('brand_name');
            $brand_remark=$request->input('brand_remark');
            if(DB::table('bi_brands')->where('id',$id)->update(['brand_name'=>$brand_name,'brand_remark'=>$brand_remark])){
                return $this->outPutRedirect(URL::action('Admin\BrandController@list'));
            }else{
                return $this->outPutError('无修改信息');
            }
        }
    }

}