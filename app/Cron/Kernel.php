<?php

namespace App\Cron;

use App\Cron\Facturacion\ProcesoFacturasPrimeroMes;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        ProcesoFacturasPrimeroMes::class
    ];

    /**
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(ProcesoFacturasPrimeroMes::class)
            ->monthlyOn(1, '0:00');
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Facturacion');

        require base_path('routes/console.php');
    }
}
