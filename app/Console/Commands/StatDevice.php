<?php

namespace App\Console\Commands;


use App\Libs\Helper;
use App\Logics\DeviceLogic;
use App\Logics\LocationLogic;
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
use App\Objects\DeviceObject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StatDevice extends BaseCommand
{

    protected $signature = 'stat:device';
    protected $description = '设备统计';

    public function __construct()
    {
        parent::__construct();
    }


    //带渠道，客户信息统计
    public function handle()
    {

        $channels = BiChannel::getAllChannelIds();
        $this->process($channels, 'channel_id',1);


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
        $cacheTime = Carbon::now()->addDay();
        foreach ($ids as $id) {

            if ($id && $whereName) {
                $where = [$whereName => $id];
            } else {
                $where = [];
            }
            $this->dailyActive($where, $keyPre);

        }

    }

    /**
     * 日活跃
     */
    private function dailyActive($where, $keyPre)
    {
        $rs = BiActiveCityDevice::join('care.t_device_code','qr','=','udid')->where($where)->select(['count(*) as total'])->first();
        var_dump($rs->total);
    }


}