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
            $from = date('Y-m-dTG:i', (time() - 120));
            $to = date('Y-m-dTG:i', time());
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.hh.ru/vacancies?page=1&per_page=1&date_from=".$from."&date_to=".$to);
            curl_setopt($ch, CURLOPT_USERAGENT,'User-Agent: api-test-agent');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            $vacancy = json_decode($result);

            Vacancy::create([
                'name' => $vacancy->items[0]->name,
                'city' => $vacancy->items[0]->area->name,
                'vacancy' => $result
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
