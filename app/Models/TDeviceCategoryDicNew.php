<?php

namespace App\Models;

/**
 * App\Models\TDeviceCategoryDicNew
 *
 * @property int $record_id
 * @property int $products
 * @property string $model 产品型号
 * @property int $channel
 * @property int $type 跟品牌一样，为了兼容老的数据才需要这个。这个字段比较恶心，但老数据都用了这个字段。
 * @property int $brand
 * @property int $ev_model
 * @property int $level
 * @property string $name
 * @property string $remark
 * @property int $rank
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereEvModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereType($value)
 * @mixin \Eloquent
 */
class TDeviceCategoryDicNew extends \App\Models\Base\TDeviceCategoryDicNew
{
	protected $fillable = [
		'products',
		'model',
		'channel',
		'type',
		'brand',
		'ev_model',
		'level',
		'name',
		'remark',
		'rank'
	];

	public function updatess($Channelname,$channel_names,$channel_remark){
        $Chann=$this->where('name',$Channelname)->where('level',3)->first();
        //dd($Chann);
        $Chann->name=$channel_names;
        $Chann->remark=$channel_remark;
        return $Chann->save();
    }
    //客户添加
    public function customeradd($channel_name,$customer_name,$customer_remark){
        $channel=$this->where('name',$channel_name)->first();
        //return $channel->channel;
        //获取到当前渠道的最大type和brand;
        $chass=$this->where('channel',$channel->channel)->where('level',5)->orderBy('type','desc')->first();
        $type=$chass->type;
        ++$type;
        $brand=$chass->brand;
        ++$brand;
        $data=[ 'products'=>6,
                'model'=>'EB001B',
                'channel'=>$channel->channel,
                'type'=>$type,
                'brand'=>$brand,
                'ev_model'=>000,
                'level'=>5,
                'name'=>$customer_name,
                'remark'=>$customer_remark,
                'rank'=>0
        ];
        return self::insert($data);
    }

    //客户修改
    public function custroedit($cuss_name,$channel_id,$customer_name,$customer_remark){
        //得到修改之前的渠道id
        $channel=$this->where('name',$cuss_name)->value('channel');
        //通过之前的渠道id和客户名称确定所需要修改的数据
        $cha=$this->where('name',$cuss_name)->where('channel',$channel)->where('level',5)->first();
        $cha->channel=$channel_id;
        $cha->name=$customer_name;
        $cha->remark=$customer_remark;
        return $cha->save();
    }

    //场景添加
    public function scenesadd($customer_name,$scenes_name,$scenes_remark){
        $channel=$this->where('name',$customer_name)->first();
        //return $channel;
        $customer=$this->where('channel',$channel->channel)->where('level',5)->first();
        $cus=$this->where('type',$customer->type)->where('level',6)->orderBy('ev_model','desc')->value('ev_model');

        if($cus){
            $ev_model=$cus+1;
        }else{
            $ev_model=1;
        }
        //return $ev_model;
        $data=[ 'products'=>6,
            'model'=>'EB001B',
            'channel'=>$customer->channel,
            'type'=>$customer->type,
            'brand'=>$customer->brand,
            'ev_model'=>$ev_model,
            'level'=>6,
            'name'=>$scenes_name,
            'remark'=>$scenes_remark,
            'rank'=>0
        ];
        return self::insert($data);
	}

	//场景修改
    public function scenesedit($sce_name,$scenes_name,$scenes_remark){
        //通过修改前的场景名称确定要修改那条数据
        $scene=$this->where('name',$sce_name)->where('level',6)->first();

        //$custo=$this->where('name',$cuss_name)->where('level',5)->first();
        //得到修改后的客户下有多少个场景
//        $evmodel=$this->where('name',$cuss_name)->where('level',6)->orderBy('ev_model','desc')->value('ev_model');
//        if($evmodel){
//            $ev_model=$evmodel+1;
//
//        }else{
//            $ev_model=1;
//        }

        $scene->name=$scenes_name;
        $scene->remark=$scenes_remark;
        return $scene->save();
	}
}
