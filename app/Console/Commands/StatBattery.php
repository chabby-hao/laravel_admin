<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Logics\LocationLogic;
use App\Logics\RedisLogic;
use App\Logics\StatLogic;
use App\Models\BiActiveCityDevice;
use App\Models\BiActiveDevice;
use App\Models\BiBrand;
use App\Models\BiChannel;
use App\Models\BiCustomer;
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\BiProvince;
use App\Models\BiScene;
use App\Models\TDevice;
use App\Models\TDeviceCategory;
use App\Models\TDeviceCategoryDicNew;
use App\Models\TDeviceCode;
use App\Models\TEvMileageGp;
use App\Objects\DeviceObject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

//为安骑物联制作的统计脚本
class StatDevice extends BaseCommand
{

    protected $signature = 'stat:battery';
    protected $description = '安骑物联-电池';

    public function __construct()
    {
        parent::__construct();
    }


    //带渠道，客户信息统计
    public function handle()
    {

        $channels = BiChannel::getAllChannelIds();
        $customers = BiCustomer::getAllIds();
        $scenes = BiScene::getAllIds();


        $this->process([0], null, DeviceObject::CACHE_ALL_PRE);//全部

        $this->process($channels, 'channel_id', DeviceObject::CACHE_CHANNEL_PRE);

        $this->process($customers, 'customer_id', DeviceObject::CACHE_CUSTOMER_PRE);//客户

        $this->process($scenes, 'scene_id', DeviceObject::CACHE_SCENE_PRE);//场景

    }

    private function process($ids, $whereName, $keyPre)
    {
        foreach ($ids as $id) {

            if ($id && $whereName) {
                $where = [$whereName => $id];
            } else {
                $where = [];
            }

            //七日活跃曲线图
            $this->batteryQuantities($where, $id, $keyPre);


        }

    }

    /**
     * 运行电池数量
     */
    private function batteryQuantities($where, $id, $keyPre)
    {
        $count = TDeviceCode::where($where)->count();
        StatLogic::setBatteryQuantities($count, $keyPre, $id);
    }

    /**
     * 充电次数
     */
    private function chargeTimes($where, $id, $keyPre)
    {
        $count = TDeviceCode::join('t_ev_charge','qr','=','udid')->where($where)->count();

    }

    /**
     * 电池状态分布
     */
    private function batteryStateDistribution($where, $id, $kerPre)
    {
        $model = TDeviceCode::where($where);
        $low = 0;//欠压
        $high = 0;//过冲保护
        $lowPower = 0;//低电量
        $charging = 0;//充电中
        $using = 0;//使用中
        $this->batchSearch($model, function (TDeviceCode $deviceCode) use (&$low, &$high, &$lowPower, &$charging, &$using){
            $imei = $deviceCode->imei;
            $key = 'last_battery:' . $imei;
            if($data = RedisLogic::getDevDataByImei($imei)){
                $battery = DeviceLogic::getBattery($imei);
                Cache::store('redis')->put($key, $battery, 120);
                if($data['low'] == 1){
                    ++$low;
                    return;
                }elseif($data['high'] == 1){
                    ++$high;
                    return;
                }

                if($battery<=20){
                    ++$lowPower;
                    return;
                }
                $lastBattery = Cache::store('redis')->get($key);
                if($battery > $lastBattery){
                    ++$charging;
                }else{
                    ++$using;
                }
            }
            DeviceLogic::clear();

        });

        $total = $low + $high + $lowPower + $charging + $using;

        $rs = [
            [
                'name'=>'欠压',
                'value'=>$low,
                'zb'=>round($low/$total),
            ],
            [
                'name'=>'低电量',
                'value'=>$lowPower,
                'zb'=>round($lowPower/$total),
            ],
            [
                'name'=>'充电中',
                'value'=>$charging,
                'zb'=>round($charging/$total),
            ],
            [
                'name'=>'使用中',
                'value'=>$using,
                'zb'=>round($using/$total),
            ],
            [
                'name'=>'过冲保护',
                'value'=>$high,
                'zb'=>round($high/$total),
            ],
        ];



    }

    /**
     * 剩余电量
     */
    private function remainElectricity($where, $id, $keyPre)
    {
        $model = TDeviceCode::where($where);
        $bat5 = 0;//小于5
        $bat525 = 0;//5-25
        $bat2550 = 0;
        $bat5075 = 0;
        $bat75 = 0;//大于75
        $this->batchSearch($model, function (TDeviceCode $deviceCode) use (&$bat5, &$high, &$lowPower, &$charging, &$using){

        });
    }

    /**
     * 电池使用时间分布
     */
    private function batteryUsingTimeDistribution()
    {

    }


}