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
class StatBattery extends BaseCommand
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

            //运行电池数量
            $this->chargeTimes($where, $id, $keyPre);

            //电池状态分布
            $this->batteryStateDistribution($where, $id, $keyPre);

            //剩余电量
            $this->remainElectricity($where, $id, $keyPre);

            //电池使用时间分布
            $this->batteryUsingTimeDistribution($where, $id, $keyPre);

        }

    }

    /**
     * 运行电池数量
     */
    private function batteryQuantities($where, $id, $keyPre)
    {
        $count = TDeviceCode::where($where)->count();

        dump($where, $count);

        StatLogic::setBatteryQuantities($count, $keyPre, $id);
    }

    /**
     * 充电次数
     */
    private function chargeTimes($where, $id, $keyPre)
    {
        $count = TDeviceCode::join('t_ev_charge','qr','=','udid')->where($where)->count();

        dump($count);

        StatLogic::setChargeTimes($count, $keyPre, $id);

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
            DeviceLogic::clear();
            $imei = $deviceCode->imei;
            $key = 'last_battery:' . $imei;
            if($data = RedisLogic::getDevDataByImei($imei)){
                $battery = DeviceLogic::getBattery($imei);
                dump($battery);
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

        });

        $total = $low + $high + $lowPower + $charging + $using;

        if($total === 0){
            $rs = [];
        }else{
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

        dump($rs);

        StatLogic::setBatteryStateDistribution($rs,$kerPre, $id);

    }

    /**
     * 剩余电量
     */
    private function remainElectricity($where, $id, $keyPre)
    {
        $model = TDeviceCode::where($where);
        $bat05 = 0;//小于5
        $bat0525 = 0;//5-25
        $bat2550 = 0;
        $bat5075 = 0;
        $bat75 = 0;//大于75
        $this->batchSearch($model, function (TDeviceCode $deviceCode) use (&$bat05, &$bat0525, &$bat2550, &$bat5075, &$bat75) {
            $imei = $deviceCode->imei;
            if (RedisLogic::getDevDataByImei($imei)) {
                $battery = DeviceLogic::getBattery($imei);
                dump($battery);
                if ($battery > 75) {
                    ++$bat75;
                } elseif ($battery > 50) {
                    ++$bat5075;
                } elseif ($battery > 25) {
                    ++$bat0525;
                } else {
                    ++$bat05;
                }
            }
            DeviceLogic::clear();
        });

        $total = $bat05 + $bat0525 + $bat5075 + $bat75 + $bat2550;

        if($total === 0){
            $rs = [];
        }else{
            $rs = [
                [
                    'name' => '<5%',
                    'value' => $bat05,
                    'zb' => round($bat05/$total),
                ],
                [
                    'name' => '5%-25',
                    'value' => $bat0525,
                    'zb' => round($bat0525/$total),
                ],
                [
                    'name' => '25%-50%',
                    'value' => $bat2550,
                    'zb' => round($bat2550/$total),
                ],
                [
                    'name' => '50%-75%',
                    'value' => $bat5075,
                    'zb' => round($bat5075/$total),
                ],
                [
                    'name' => '>75%',
                    'value' => $bat75,
                    'zb' => round($bat75/$total),
                ],
            ];
        }

        dump($rs);

        StatLogic::setRemainElectricity($rs, $keyPre, $id);
    }

    /**
     * 电池使用时间分布
     */
    private function batteryUsingTimeDistribution($where, $id, $keyPre)
    {
        $month1 = Carbon::now()->subMonth()->getTimestamp();
        $coutMonth1 = TDeviceCode::where($where)->where('active','>=', $month1)->count();//1个月内

        $month6 = Carbon::now()->subMonths(6)->getTimestamp();
        $coutMonth16 = TDeviceCode::where($where)->whereBetween('active',[$month6, $month1])->count();//1-6个月内

        $month12 = Carbon::now()->subMonths(12)->getTimestamp();
        $coutMonth612 = TDeviceCode::where($where)->whereBetween('active',[$month12, $month6])->count();//6-12个月内

        $month24 = Carbon::now()->subMonths(24)->getTimestamp();
        $coutMonth1224 = TDeviceCode::where($where)->whereBetween('active',[$month24, $month12])->count();//12-24个月内

        $coutMonth24 = TDeviceCode::where($where)->whereBetween('active',[1, $month24])->count();//24个月以上

        $total = $coutMonth1 + $coutMonth16 + $coutMonth612 + $coutMonth1224 + $coutMonth24;

        $rs = [
            [
                'name'=>'1个月以内',
                'value'=>$coutMonth1,
                'zb'=>ceil($coutMonth1/$total),
            ],
            [
                'name'=>'1-6个月',
                'value'=>$coutMonth16,
                'zb'=>ceil($coutMonth16/$total),
            ],
            [
                'name'=>'6-12个月',
                'value'=>$coutMonth612,
                'zb'=>ceil($coutMonth612/$total),
            ],
            [
                'name'=>'12-24个月',
                'value'=>$coutMonth1224,
                'zb'=>ceil($coutMonth1224/$total),
            ],
            [
                'name'=>'24个月以上',
                'value'=>$coutMonth24,
                'zb'=>ceil($coutMonth24/$total),
            ],
        ];

        dump($rs);

        StatLogic::setBatteryUsingTimeDistribution($rs, $keyPre, $id);

    }


}