<?php

namespace App\Console;

use App\Parser;
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

            // Get parser data from DB
            $parser = Parser::where('status', 1)->first();

            if($parser) {

                // Set time period for parsing
                $from = date('Y-m-d\TH:i:s', (time() - 290));
                $to = date('Y-m-d\TH:i:s', time());
                $count = 0;

                // Get vacancies from donor
                $data = $this->getVacancies($parser->url, $from, $to, 0, 200);

                if($data) {

                    // Insert vacancies into DB
                    $count += $this->insertVacancies($data);

                    if($data->pages > 0) {

                        //Get and insert vacancies if isset more pages
                        for($i = 1; $i <= $data->pages; $i++) {

                            $result = $this->getVacancies($parser->url, $from, $to, $i, 200);

                            if($result) {
                                $count += $this->insertVacancies($result);
                            }
                        }
                    }
                }
                $result = [
                    'sessions' => $parser->sessions + 1,
                    'new' => $count,
                    'total' => $parser->total + $count,
                ];
                Parser::where('id', $parser->id)->update($result);
//                Parser::increment('sessions');
            }
        })->everyFiveMinutes();
    }

    private function getVacancies($url, $from, $to, $page, $perPage)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url?page=$page&per_page=$perPage&date_from=$from&date_to=$to");
        curl_setopt($ch, CURLOPT_USERAGENT,'User-Agent: api-test-agent');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }

    private function insertVacancies($data)
    {
        $vacancies = collect();
        $count = 0;
        foreach($data->items as $item) {
            $date = date('Y-m-d H:i:s');
            $count++;
            $vacancies->push([
                'vacancy_id' => $item->id,
                'vacancy_url' => $item->alternate_url,
                'vacancy_name' => $item->name,
                'requirement' => $item->snippet->requirement,
                'responsibility' => $item->snippet->responsibility,
                'salary_from' => $item->salary->from ?? null,
                'salary_to' => $item->salary->to ?? null,
                'salary_currency' => $item->salary->currency ?? null,
                'employer_id' => $item->employer->id ?? null,
                'employer_url' => $item->employer->alternate_url ?? null,
                'employer_name' => $item->employer->name ?? null,
                'city' => $item->area->name,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
        Vacancy::insert($vacancies->toArray());

        return $count;
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
