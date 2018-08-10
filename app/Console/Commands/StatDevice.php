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
use App\Models\BiEbikeType;
use App\Models\BiProductType;
use App\Models\BiProvince;
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
        $this->process($channels, 'channel_id', DeviceObject::CACHE_CHANNEL_PRE);


        //日活跃

        //出行次数

        //出行频次
        //出行距离

        //活跃车辆地理分布 bi_active_city_devices

        //车型分布

        //七日活跃曲线图

        //出行次数分布
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
        $total = $this->travelTimes($where, $id, $keyPre);

        $count = TDeviceCode::where($where)->count();

        $freq = number_format($total / $count, 1);

    }

    /**
     * 出行距离 Trip distance
     */
    private function tripDistance($where, $id, $keyPre)
    {
        $total = TEvMileageGp::join('care.t_device_code', 'qr', '=', 'udid')->where($where)->sum('mile');


    }

    /**
     * 活跃车辆地理分布 Active geographical distribution
     */
    private function activeGeographicalDistribution($where, $id, $keyPre)
    {
        $provinceMap = BiProvince::getAllProvinceMap();
        // pid->province           pid->total         province->total
        $where['date'] = Carbon::today()->toDateString();
        $rs = BiActiveCityDevice::join('care.t_device_code', 'qr', '=', 'udid')
            ->where($where)->groupBy(['bi_active_city_devices.pid'])
            ->selectRaw('count(*) as total, bi_active_city_devices.pid')->get()->toArray();
        $pidTotalMap = Helper::transToKeyValueArray($rs, 'pid', 'total');

        $totalAll = array_sum($pidTotalMap);

        $data = [];
        foreach ($pidTotalMap as $pid => $total) {
            $data[] = [
                'name' => $provinceMap[$pid],
                'value' => $total,
                'zb' => ceil($total / $totalAll),
            ];
        }

        $provinceTotalMap = [];
        foreach ($provinceMap as $pid => $province) {
            $provinceTotalMap[$province] = 0;
        }

        foreach ($pidTotalMap as $pid => $total) {
            $provinceTotalMap[$provinceMap[$pid]] = $total;
        }

    }

    /**
     * 车型分布 Vehicle distribution
     */
    private function vehicleDistribution($where, $id, $keyPre)
    {
        $ebikeTypeMap = BiEbikeType::getTypeName();
        $brandMap = BiBrand::getBrandMap();

        $rs = TDeviceCode::getDeviceModel()->where($where)->groupBy(['ebike_type_id'])
            ->selectRaw('count(*) as total,ebike_type_id,brand_id')->get();

        $totalRs = array_map(function ($v) {
            return $v['total'];
        }, $rs);
        $total = array_sum($totalRs);


        $data = [];
        foreach ($rs as $deviceCode) {
            $data[] = [
                'name' => $ebikeTypeMap[$deviceCode->ebike_type_id],
                'brand' => $brandMap[$deviceCode->brand_id],
                'zb' => ceil($deviceCode->total / $total),
                'value' => $deviceCode->total,
            ];
        }

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
                'zb' => ceil($row->total / $totalAll)
            ];
        }

    }

    /**
     * 出行次数分布 Trip frequency distribution
     */
    private function tripFrequencyDistribution($where, $id, $keyPre)
    {
        $rs = TEvMileageGp::join('care.t_device_code', 'qr', '=', 'udid')
            ->where($where)
            ->groupBy(['udid'])
            ->selectRaw('count(*) as total')
            ->get()->toArray();

        $rs = Helper::transToOneDimensionalArray($rs, 'total');

        $totalAll = array_sum($rs);

        $countMap = array_count_values($rs);
        ksort($countMap);
        $map = [1, 2, 3, 4];
        $data = [];
        foreach ($countMap as $count => $total) {
            foreach ($map as $cond) {
                if ($count == $cond) {
                    $data[] = [
                        'name' => $cond . '次',
                        'value' => $total,
                        'zb' => ceil($total / $totalAll),
                    ];
                    break;
                }
                if ($count > $cond) {
                    $data[] = [
                        'name' => $cond . '次以上',
                        'value' => $total,
                        'zb' => ceil($total / $totalAll),
                    ];
                }
            }

        }

    }

}