<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


abstract class BaseCommand extends Command
{

    public function __construct()
    {
        parent::__construct();
    }


}