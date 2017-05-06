<?php

namespace App\Console;

use App\Vacancy;
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
        $schedule->call(function () {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.hh.ru/vacancies?page=1&per_page=1');
            curl_setopt($ch, CURLOPT_USERAGENT,'User-Agent: api-test-agent');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $vacancy = curl_exec($ch);
            curl_close($ch);

            Vacancy::create([
                'city' => 'Donetsk',
                'vacancy' => $vacancy
            ]);
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
