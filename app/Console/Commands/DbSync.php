<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Models\BiBrand;
use App\Models\BiChannel;
use App\Models\BiDeviceType;
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
        //$this->categoryDicNew();
        $this->deviceCode();
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
            BiProductType::PRODUCT_TYPE_EB001 => 'EB001',
            BiProductType::PRODUCT_TYPE_EB001B => 'EB001B',
            BiProductType::PRODUCT_TYPE_EB001C => 'EB001C',
            BiProductType::PRODUCT_TYPE_EB001A => 'EB001A',
            BiProductType::PRODUCT_TYPE_EB001D => 'EB001D',
            BiProductType::PRODUCT_TYPE_EB001W => 'EB001W',
            BiProductType::PRODUCT_TYPE_B640 => 'B640',
            BiProductType::PRODUCT_TYPE_EB003 => 'EB003A',
            BiProductType::PRODUCT_TYPE_EB485 => 'EB485',
        ];

        $arrFlip = array_flip($arr);

        foreach ($res as $row) {
            $name = $row->name;
            if ($row->level == 2) {
                if (isset($arrFlip[$name])) {
                    //产品类型
                    BiProductType::firstOrCreate([
                        'product_name' => $name,
                        'id' => $arrFlip[$name],
                    ], [
                        'product_remark' => $row->remark
                    ]);
                }

            } elseif ($row->level == 3) {
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
                    'id' => $row->type,
                    'brand_remark' => $row->remark,
                ]);
            }
        }

        foreach ($res as $row) {
            if ($row->level == 6) {
                //车型
                $name = $row->name;
                $type = $row->type;
                $val = TDeviceCategoryDicNew::where(['type' => $type, 'level' => 5])->first();
                if ($val) {
                    $brandName = $val->name;
                    $brandModel = BiBrand::whereBrandName($brandName)->first();
                    $brandId = $brandModel->id;
                    BiEbikeType::firstOrCreate([
                        'ebike_name' => $name,
                        //'ev_model'=>$row->ev_model,
                    ], [
                        'ebike_remark' => $row->remark,
                        'brand_id' => $brandId,
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

        $dicNews = TDeviceCategoryDicNew::whereLevel(3)->whereProducts(6)->get()->keyBy('channel')->toArray();

        //手动修改漏掉的渠道
        $dicNews[11] = ['name' => '双马'];

        $types = TDeviceCategoryDicNew::whereLevel(5)->whereProducts(6)->get()->toArray();
        $types = Helper::transToOneDimensionalArray($types, 'type');
        $page = 1;
        $perPage = 30;
        $model = TDeviceCode::getDeviceModel()->whereIn('type', $types);
        do {
            $pagination = $model->simplePaginate($perPage, ['*'], 'page', $page++);

            /** @var TDeviceCode $deviceCode */
            foreach ($pagination->items() as $deviceCode) {
                $udid = $deviceCode->qr;
                echo "begin processing udid: $udid" . "\n";
                $type = $deviceCode->type;
                if ($row = TDeviceCategory::whereUdid($udid)->first()) {
                    $evModel = substr($row->model, -3);

                    $dicNew = TDeviceCategoryDicNew::whereType($type)->whereEvModel($evModel)->whereLevel(6)->first();
                    if (!$dicNew) {
                        $dicNew = TDeviceCategoryDicNew::whereType($type)->whereLevel(6)->first();
                        if (!$dicNew) {
                            continue;
                        }
                    }

                    $brandName = TDeviceCategoryDicNew::whereType($type)->whereLevel(5)->first()->name;

                    $oldEvName = $dicNew->name;
                    $channel = $dicNew->channel;
                    $channelName = $dicNews[$channel]['name'];

                    $channelId = BiChannel::whereChannelName($channelName)->first()->id;

                    $ebike = BiEbikeType::whereEbikeName($oldEvName)->first();

                    $brandId = BiBrand::whereBrandName($brandName)->first()->id;

                    $ebikeId = $ebike->id;

                    $deviceCode->channel_id = $channelId;
                    $deviceCode->ebike_type_id = $ebikeId;
                    $deviceCode->brand_id = $brandId;


                    //设备状态
                    if ($deviceCode->active > 0) {
                        $deviceCode->device_cycle = TDeviceCode::DEVICE_CYCLE_INUSE;
                    }/*else{
                        $deviceCode->device_cycle = TDeviceCode::DEVICE_CYCLE_CHANNEL_STORAGE;
                    }*/

                    $typeMap = BiDeviceType::getNameMap();
                    $typeMap = array_flip($typeMap);
                    //车型更新初始化
                    if (DeviceLogic::isEb001b($udid)) {

                        if (in_array($ebikeId, [18, 4, 15])) {
                            $deviceCode->device_type = $typeMap['B600'];
                        } elseif (in_array($ebikeId, [17])) {
                            $deviceCode->device_type = $typeMap['B605'];
                        } elseif (in_array($ebikeId, [21, 7])) {
                            $deviceCode->device_type = $typeMap['B800'];
                        } elseif (in_array($ebikeId, [26, 20, 19])) {
                            $deviceCode->device_type = $typeMap['B610'];
                        } elseif (in_array($ebikeId, [8])) {
                            $deviceCode->device_type = $typeMap['B611'];
                        } elseif (in_array($ebikeId, [31, 25])) {
                            $deviceCode->device_type = $typeMap['B620'];
                        } elseif (in_array($ebikeId, [3])) {
                            $deviceCode->device_type = $typeMap['B621'];
                        } elseif (in_array($ebikeId, [30])) {
                            $deviceCode->device_type = $typeMap['B630'];
                        } elseif (in_array($ebikeId, [10])) {
                            $deviceCode->device_type = $typeMap['B660'];
                        } elseif (in_array($ebikeId, [1])) {
                            $deviceCode->device_type = $typeMap['B661'];
                        }
                    }

                    if($deviceCode->model == BiProductType::PRODUCT_TYPE_EB001){
                        $deviceCode->device_type = $typeMap['EB001'];
                    }elseif($deviceCode->model == BiProductType::PRODUCT_TYPE_EB001C){
                        $deviceCode->device_type = $typeMap['EB001C'];
                    }elseif($deviceCode->model == BiProductType::PRODUCT_TYPE_EB001A){
                        $deviceCode->device_type = $typeMap['EB001A'];
                    }

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