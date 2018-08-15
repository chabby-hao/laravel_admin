<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Logics\LocationLogic;
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

    protected $signature = 'stat:device';
    protected $description = '安骑物联-车辆';

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
            //日活跃
            $this->dailyActive($where, $id, $keyPre);

            //出行次数
            $this->travelTimes($where, $id, $keyPre);

            //出行频次
            $this->travelFrequency($where, $id, $keyPre);

            //出行距离
            $this->tripDistance($where, $id, $keyPre);

            //活跃车辆地理分布
            $this->activeGeographicalDistribution($where, $id, $keyPre);

            //车型分布
            $this->vehicleDistribution($where, $id, $keyPre);

            //七日活跃曲线图
            $this->activeCurve($where, $id, $keyPre);

            //出行次数分布
            $this->tripFrequencyDistribution($where, $id, $keyPre);

        }

    }

    /**
     * 日活跃
     */
    private function dailyActive($where, $id, $keyPre)
    {
        $where['date'] = Carbon::today()->toDateString();
        $total = BiActiveCityDevice::join('care.t_device_code', 'qr', '=', 'udid')->where($where)->count();

        StatLogic::setDailyActive($total, $keyPre, $id);
    }

    /**
     * 出行次数 Travel times
     */
    private function travelTimes($where, $id, $keyPre)
    {
        $total = TEvMileageGp::join('care.t_device_code', 'qr', '=', 'udid')->where($where)->count();
        StatLogic::setTravelTimes($total, $keyPre, $id);
        return $total;
    }

    /**
     * 出行频次 Travel frequency
     */
    private function travelFrequency($where, $id, $keyPre)
    {
        $timesWhere = $where;
        $timesWhere[0] = ['begin', '>', strtotime('-30 days')];
        $total = $this->travelTimes($timesWhere, $id, $keyPre);

        $count = TDeviceCode::where($where)->count();

        $freq = $count === 0 ? 0 : number_format($total / $count / 30, 1, '.','');

        StatLogic::setTravelFrequency($freq, $keyPre, $id);
    }

    /**
     * 出行距离 Trip distance
     */
    private function tripDistance($where, $id, $keyPre)
    {
        $total = TEvMileageGp::join('care.t_device_code', 'qr', '=', 'udid')->where($where)->sum('mile');

        $total = round($total);
        StatLogic::setTripDistance($total, $keyPre, $id);
    }

    /**
     * 活跃车辆地理分布 Active geographical distribution
     */
    private function activeGeographicalDistribution($where, $id, $keyPre)
    {
        $provinceMap = BiProvince::getAllProvinceMap(true);
        // pid->province           pid->total         province->total
        $where['date'] = Carbon::today()->toDateString();
        $rs = BiActiveCityDevice::join('care.t_device_code', 'qr', '=', 'udid')
            ->where($where)->groupBy(['bi_active_city_devices.pid'])
            ->selectRaw('count(*) as total, bi_active_city_devices.pid')->get()->toArray();
        $pidTotalMap = Helper::transToKeyValueArray($rs, 'pid', 'total');

        $totalAll = array_sum($pidTotalMap);

        $data = [];
        foreach ($provinceMap as $pid => $province) {
            $value = $pidTotalMap[$pid] ? : 0;
            $data[] = [
                'name'=>$provinceMap[$pid],
                'value'=>$value,
                'zb'=>$totalAll === 0 ? 0 : number_format($value / $totalAll, 2),
            ];
        }

        /*
         * {
                        name:"南海诸岛",value:0,
                        itemStyle:{
                            normal:{opacity:0,label:{show:false}}
                        }
                      }
         */
        $data[] = [
            'name'=>'南海诸岛',
            'value'=>0,
            'itemStyle'=>[
                'normal'=>[
                    'opacity'=>0,
                    'label'=>[
                        'show'=>false,
                    ]
                ]
            ],
        ];

        StatLogic::setActiveGeographicalDistribution($data, $keyPre, $id);

    }

    /**
     * 车型分布 Vehicle distribution
     */
    private function vehicleDistribution($where, $id, $keyPre)
    {
        $ebikes = BiEbikeType::all()->keyBy('id');
        $ebikeTypeMap = BiEbikeType::getTypeName();
        $brandMap = BiBrand::getBrandMap();

        $rs = TDeviceCode::getDeviceModel()->where($where)->where('ebike_type_id','!=','')->groupBy(['ebike_type_id'])
            ->selectRaw('count(*) as total,ebike_type_id')
            ->orderByDesc('total')->get();


        $arrs = $rs->toArray();

        $totalRs = array_map(function ($v) {
            return $v['total'];
        }, $arrs);
        $total = array_sum($totalRs);


        $data = [];
        $t = 0;
        foreach ($rs as $deviceCode) {
            ++$t;
            $brandId = $ebikes[$deviceCode->ebike_type_id]['brand_id'];
            $data[] = [
                'name' => $ebikeTypeMap[$deviceCode->ebike_type_id],
                'brand' => $brandMap[$brandId],
                'zb' => $total === 0 ? 0 : number_format($deviceCode->total / $total, 2),
                'value' => $deviceCode->total,
            ];
            if($t === 6){
                break;
            }
        }

        StatLogic::setVehicleDistribution($data, $keyPre, $id);

    }

    /**
     * 活跃曲线图（7日） Active curve
     */
    private function activeCurve($where, $id, $keyPre)
    {
        $rs = BiActiveCityDevice::join('care.t_device_code', 'qr', '=', 'udid')
            ->where($where)
            ->where('date', '>', Carbon::today()->subWeek()->toDateString())
            ->groupBy(['date'])
            ->selectRaw('count(*) as total,date')->get();

        $totalAll = TDeviceCode::getDeviceModel()->where($where)->count();

        $data = [];
        foreach ($rs as $row) {
            $data[] = [
                'name' => Carbon::createFromFormat('Y-m-d', $row->date)->format('m.d'),
                'value' => $row->total,
                'zb' => $totalAll === 0 ? 0 : number_format($row->total / $totalAll, 3)
            ];
        }

        StatLogic::setActiveCurve($data, $keyPre, $id);
    }

    /**
     * 出行次数分布 Trip frequency distribution
     */
    private function tripFrequencyDistribution($where, $id, $keyPre)
    {
        $rs = TEvMileageGp::join('care.t_device_code', 'qr', '=', 'udid')
            ->where($where)
            ->where('begin','>',strtotime('-1 day'))
            ->groupBy(['udid'])
            ->selectRaw('count(*) as total')
            ->get()->toArray();

        $totalAll = TDeviceCode::getDeviceModel()->count();

        $rs = Helper::transToOneDimensionalArray($rs, 'total');

        $total0 = $totalAll - count($rs);
        //$totalAll = count($rs);

        $countMap = array_count_values($rs);
        $countMap[0] = $total0;
        ksort($countMap);
        $map = [0, 1, 2, 3, 4];
        $max = max($map);
        $maxTotal = 0;
        $data = [];
        foreach ($countMap as $count => $total) {
            foreach ($map as $cond) {
                if ($count > $max) {
                    $maxTotal += $total;
                    break;
                } elseif ($count == $cond) {
                    $data[] = [
                        'name' => $cond . '次',
                        'value' => $total,
                        'zb' => $totalAll === 0 ? 0 : number_format($total / $totalAll, 2),
                    ];
                    break;
                }
            }

        }
        $data[] = [
            'name' => $max . '次以上',
            'value' => $maxTotal,
            'zb' => $totalAll === 0 ? 0 : number_format($maxTotal / $totalAll, 2),
        ];

        StatLogic::setTripFrequencyDistribution($data, $keyPre, $id);

    }


}