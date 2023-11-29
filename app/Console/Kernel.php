<?php

namespace App\Console;

use App\Events\Amoniak;
use App\Events\AmoniakProccess;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')
        //      ->everySecond()
        //      ->appendOutputTo(storage_path('logs/inspire.log'));
        $schedule->exec('php artisan db:seed')->everySecond();
        $schedule->call(function () {
            event(new Amoniak());
        })->everyTwoSeconds()->appendOutputTo(storage_path('logs/inspire.log'));
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
