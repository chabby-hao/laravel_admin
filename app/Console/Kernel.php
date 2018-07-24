<?php

namespace App\Console;

use App\Console\Commands\DbSync;
use App\Console\Commands\DeviceCache;
use App\Console\Commands\MapCache;
use App\Console\Commands\Test;
use App\Console\Commands\WarningMile;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        if(env('APP_ENV') != 'local'){
            $schedule->command(WarningMile::class)->hourly();
            $schedule->command(DbSync::class)->everyThirtyMinutes();
            $schedule->command(DeviceCache::class)->everyFifteenMinutes();
            $schedule->command(MapCache::class)->everyThirtyMinutes();
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
