<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Models\BiBrand;
use App\Models\BiChannel;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\TDeviceCategory;
use App\Models\TDeviceCategoryDicNew;
use App\Models\TDeviceCode;
use Illuminate\Support\Facades\DB;

class DbSync extends BaseCommand
{

    protected $signature = 'db:sync';
    protected $description = '新老数据库同步';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $this->categoryDicNew();
        //$this->deviceCode();
    }

    /**
     * 渠道相关表同步
     */
    private function categoryDicNew()
    {
        $dbOperate = DB::connection('care_operate');
        $db = $dbOperate->table('t_device_category_dic_new');

        $res = $db->where(['products' => 6])->orderByDesc('type')->get()->toArray();

        $arr = [
            '1'=>'EB001',
            '2'=>'EB001B',
            '3'=>'EB001C',
            '4'=>'EB001A',
            '5'=>'EB001D',
            '6'=>'EB001W',
            '7'=>'B640',
            '8'=>'EB003A',
        ];

        $arrFlip = array_flip($arr);

        foreach ($res as $row) {
            $name = $row->name;
            if ($row->level == 2) {
                if(isset($arrFlip[$name])){
                    //产品类型
                    BiProductType::firstOrCreate([
                        'product_name' => $name,
                        'id'=>$arrFlip[$name],
                    ], [
                        'product_remark' => $row->remark
                    ]);
                }

            } elseif ($row->level == 3 && false) {
                //渠道
                BiChannel::firstOrCreate([
                    'channel_name' => $name,
                ], [
                    'channel_remark' => $row->remark,
                ]);
                //$a = BiChannel::whereChannelName($name)->first();
                //var_dump($a);exit;
            } elseif ($row->level == 5) {
                //品牌
                BiBrand::firstOrCreate([
                    'brand_name' => $name,
                ], [
                    'id'=>$row->type,
                    'brand_remark' => $row->remark,
                ]);
            }
        }

        foreach ($res as $row) {
            if ($row->level == 6) {
                //车型
                $name = $row->name;
                $type = $row->type;
                $val = TDeviceCategoryDicNew::where(['type'=>$type,'level'=>5])->first();
                if($val){
                    $brandName = $val->name;
                    $brandModel = BiBrand::whereBrandName($brandName)->first();
                    $brandId = $brandModel->id;
                    BiEbikeType::firstOrCreate([
                        'ebike_name'=>$name,
                        //'ev_model'=>$row->ev_model,
                    ],[
                        'ebike_remark'=>$row->remark,
                        'brand_id'=>$brandId,
                    ]);
                }
            }
        }

        echo "渠道done" . "\n";
    }

    /**
     * 设备码相关表同步
     */
    private function deviceCode()
    {
        $conn = DB::connection('care');
        $conn->table('t_device_code')->get()->toArray();

        $dicNews = TDeviceCategoryDicNew::whereLevel(3)->whereProducts(6)->get()->keyBy('channel')->toArray();

        //手动修改漏掉的渠道
        $dicNews[11] = ['name'=>'双马'];

        $types = TDeviceCategoryDicNew::whereLevel(5)->whereProducts(6)->get()->toArray();
        $types = Helper::transToOneDimensionalArray($types, 'type');
        $page = 1;
        $perPage = 100;
        do {
            $pagination = TDeviceCode::whereIn('type', $types)->simplePaginate($perPage, ['*'], 'page', $page++);

            /** @var TDeviceCode $deviceCode */
            foreach ($pagination->items() as $deviceCode) {
                $udid = $deviceCode->qr;
                echo "begin processing udid: $udid" . "\n";
                $type = $deviceCode->type;
                if($row = TDeviceCategory::whereUdid($udid)->first()){
                    $evModel = substr($row->model, -3);

                    $dicNew = TDeviceCategoryDicNew::whereType($type)->whereEvModel($evModel)->whereLevel(6)->first();
                    if(!$dicNew){
                        $dicNew = TDeviceCategoryDicNew::whereType($type)->whereLevel(6)->first();
                        if(!$dicNew){
                            continue;
                        }
                    }

                    $brandName = TDeviceCategoryDicNew::whereType($type)->whereLevel(5)->first()->name;

                    $oldEvName =$dicNew->name;
                    $channel = $dicNew->channel;
                    $channelName = $dicNews[$channel]['name'];

                    $channelId = BiChannel::whereChannelName($channelName)->first()->id;

                    $ebike = BiEbikeType::whereEbikeName($oldEvName)->first();

                    $brandId = BiBrand::whereBrandName($brandName)->first()->id;

                    $deviceCode->channel_id = $channelId;
                    $deviceCode->ebike_type_id = $ebike->id;
                    $deviceCode->brand_id = $brandId;

                    //var_dump($deviceCode->toArray());

                    $deviceCode->save();

                    echo "process success udid: $udid, chanel_id:$channelId, eb_type_id:{$ebike->id}" . "\n";


                    /*$brandName = $dicNew->name;
                    $brandId = BiBrand::whereBrandName($brandName)->first()->id;
                    //$brandId = $row->category;
                    $evModel = substr($row->model, -3);
                    if($ebike = BiEbikeType::whereBrandId($brandId)->whereEvModel($evModel)->first()){
                        $deviceCode->ebike_type_id = $ebike->id;
                        if($dicNew = TDeviceCategoryDicNew::whereType($type)->whereLevel(5)->first()){
                            $channel = $dicNew->channel;
                            $channelName = $dicNews[$channel]['name'];
                            $channelId = BiChannel::whereChannelName($channelName)->first()->id;
                            $deviceCode->channel_id = $channelId;
                            $deviceCode->save();
                            echo "process success udid: $udid, chanel_id:$channelId, eb_type_id:{$ebike->id}" . "\n";
                        }
                    }*/
                }
            }

        } while ($pagination->hasMorePages());

    }
}