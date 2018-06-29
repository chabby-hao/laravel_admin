<?php

namespace App\Console\Commands;

use App\Logics\DeviceLogic;
use App\Models\TDeviceCode;
use Illuminate\Console\Command;


abstract class BaseCommand extends Command
{

    protected $maxCache = 0;//MB

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param \Eloquent $model
     */
    protected function batchSearch($model, callable $func)
    {
        $page = 1;
        $perPage = 100;
        $rtn = [];
        do {
            $pagination = $model->simplePaginate($perPage, ['*'], 'page', $page++);
            foreach ($pagination->items() as $row) {
//                $tmp = $func($row);
//                if($tmp){
//                    $rtn[] = $tmp;
//                }
            }

        } while ($pagination->hasMorePages());
        return $rtn;
    }

    protected function chmodCache0777()
    {
        $cachePath = storage_path("framework/cache");
        exec("chmod -R 0777 $cachePath", $out);
        echo "\n";
        echo 'exec chmod msg :' . json_encode($out) . "\n";
    }

    protected function getMaxCache($echo = true)
    {
        $this->maxCache = max(memory_get_usage()/1024/1024, $this->maxCache);
        if($echo){
            echo  'maxCache :' . $this->maxCache . "------MB-----------\n";
        }
        return $this->maxCache;
    }

}