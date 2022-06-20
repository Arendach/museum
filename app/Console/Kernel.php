<?php

namespace App\Console;

use App\Console\Commands\GenerateTranslations;
use App\Console\Commands\ImageOptimize;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        GenerateTranslations::class,
        ImageOptimize::class,
    ];

    protected function schedule(Schedule $schedule)
    {
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
