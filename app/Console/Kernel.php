<?php

namespace App\Console;

use App\Vacancy;
use Illuminate\Support\Facades\DB;
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

            $from = date('Y-m-d\TH:i:s', (time() - 290));
            $to = date('Y-m-d\TH:i:s', time());

            DB::table('info')->insert(
                ['date_from' => $from, 'date_to' => $to, 'url' => 0]
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.hh.ru/vacancies?page=0&per_page=200&date_from=$from&date_to=$to");
            curl_setopt($ch, CURLOPT_USERAGENT,'User-Agent: api-test-agent');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            $vacancies = json_decode($result);

            foreach($vacancies->items as $vacancy) {
                Vacancy::create([
                    'vacancy_id' => $vacancy->id,
                    'vacancy_url' => $vacancy->alternate_url,
                    'vacancy_name' => $vacancy->name,
                    'requirement' => $vacancy->snippet->requirement,
                    'responsibility' => $vacancy->snippet->responsibility,
                    'salary_from' => $vacancy->salary->from ?? null,
                    'salary_to' => $vacancy->salary->to ?? null,
                    'salary_currency' => $vacancy->salary->currency ?? null,
                    'employer_id' => $vacancy->employer->id,
                    'employer_url' => $vacancy->employer->alternate_url,
                    'employer_name' => $vacancy->employer->name,
                    'city' => $vacancy->area->name,
                ]);
            }

            if($vacancies->pages > 0) {
                for($i = 1; $i <= $vacancies->pages; $i++) {

                    DB::table('info')->insert(
                        ['date_from' => $from, 'date_to' => $to, 'url' => $i]
                    );

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://api.hh.ru/vacancies?page=$i&per_page=200&date_from=$from&date_to=$to");
                    curl_setopt($ch, CURLOPT_USERAGENT,'User-Agent: api-test-agent');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $result = curl_exec($ch);
                    curl_close($ch);

                    $vacancies = json_decode($result);

                    foreach($vacancies->items as $vacancy) {
                        Vacancy::create([
                            'vacancy_id' => $vacancy->id,
                            'vacancy_url' => $vacancy->alternate_url,
                            'vacancy_name' => $vacancy->name,
                            'requirement' => $vacancy->snippet->requirement,
                            'responsibility' => $vacancy->snippet->responsibility,
                            'salary_from' => $vacancy->salary->from ?? null,
                            'salary_to' => $vacancy->salary->to ?? null,
                            'salary_currency' => $vacancy->salary->currency ?? null,
                            'employer_id' => $vacancy->employer->id,
                            'employer_url' => $vacancy->employer->alternate_url,
                            'employer_name' => $vacancy->employer->name,
                            'city' => $vacancy->area->name,
                        ]);
                    }
                }
            }

        })->everyFiveMinutes()->when(function () {
            return config('parser.enable');
        });
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
