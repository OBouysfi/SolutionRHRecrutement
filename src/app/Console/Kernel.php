<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        // Exécuter le job toutes les minutes
        // $schedule->job(new \App\Jobs\JobOffer\UpdateJobOfferStatus())->everyMinute();

        // Exécuter le job une seule fois à 00:01 chaque jour
        $schedule->job(new \App\Jobs\JobOffer\UpdateJobOfferStatus())->dailyAt('00:01');

        // php artisan schedule:work
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
