<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
<<<<<<< HEAD
     */
    protected function schedule(Schedule $schedule): void
=======
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
<<<<<<< HEAD
     */
    protected function commands(): void
=======
     *
     * @return void
     */
    protected function commands()
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
