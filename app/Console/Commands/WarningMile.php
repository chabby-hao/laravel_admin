<?php

namespace App\Console\Commands;

use App\Models\TEvMileageGp;

class WarningMile extends BaseWarning
{

    protected $signature = 'warning:mile';
    protected $description = '里程预警';

    public function __construct()
    {
        parent::__construct();
    }

    private $maxMile = 1;

    public function handle()
    {

        //$db = DB::connection('care');

//     "first_page_url":"http://localhost?page=1",
//    "from":11,
//    "next_page_url":"http://localhost?page=3",
//    "path":"http://localhost",
//    "per_page":10,
//    "prev_page_url":"http://localhost?page=1",
//    "to":20


        $page = 1;
        $perPage = 100;
        $mids = [];
        $whereBegin = [
            strtotime('-10 minutes'),
            time(),
        ];
        $warningData = [];
        do {
            $pagination = TEvMileageGp::whereBetween('begin',$whereBegin)->simplePaginate($perPage, ['*'], 'page', $page++);
            //$pagination = TEvMileageGp::simplePaginate($perPage, ['*'], 'page', $page++); //test

            /** @var TEvMileageGp $item */
            foreach ($pagination->items() as $item) {
                if ($item->mile > $this->maxMile) {
                    //满足报警条件，报警
                    $log = 'find mile>' . $this->maxMile . ' with data:' . json_encode($item);
                    $this->warning($log);
                    $mids[] = $item->mid;
                    $text = '设备: ' . $item->udid. ' 从 ' . date('Y-m-d H:i:s', $item->begin) . ' 至 ' . date('Y-m-d H:i:s', $item->end) . ' 单次行驶 ' . $item->mile . 'km';
                    $warningData[] = $text;
                    echo $log . "\n";
                    echo $text . "\n";
                }
            }

        } while ($pagination->hasMorePages());

        if($warningData){
            $this->sendEmail($warningData);
        }

    }
}