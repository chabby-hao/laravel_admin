<?php

namespace App\Console;

use App\Console\Commands\DbSync;
use App\Console\Commands\DeviceAddress;
use App\Console\Commands\DeviceCache;
use App\Console\Commands\MapCache;
use App\Console\Commands\StatDevice;
use App\Console\Commands\Test;
use App\Console\Commands\UpiotSync;
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
            $schedule->command(WarningMile::class)->hourly()->runInBackground();
            $schedule->command(DbSync::class)->everyFiveMinutes()->runInBackground();
            $schedule->command(DeviceCache::class)->everyThirtyMinutes()->runInBackground();
            $schedule->command(MapCache::class)->hourly()->runInBackground();
            $schedule->command(DeviceAddress::class)->everyFiveMinutes()->runInBackground();
            $schedule->command(StatDevice::class)->everyFifteenMinutes()->runInBackground();
            $schedule->command(UpiotSync::class)->hourly()->runInBackground();
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
