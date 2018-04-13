<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


abstract class BaseCommand extends Command
{

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
                $rtn[] = $func($row);
            }

        } while ($pagination->hasMorePages());
        return $rtn;
    }

}