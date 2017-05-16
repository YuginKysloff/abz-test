<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function index()
    {

//        $from = date('Y-m-d\TH:i:s', (time() - 30));
//        $to = date('Y-m-d\TH:i:s', time());
//
//        DB::table('info')->insert(
//            ['date_from' => $from, 'date_to' => $to, 'url' => "https://api.hh.ru/vacancies?page=0&per_page=5&date_from=$from&date_to=$to"]
//        );
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, "https://api.hh.ru/vacancies?page=0&per_page=5&date_from=$from&date_to=$to");
//        curl_setopt($ch, CURLOPT_USERAGENT,'User-Agent: api-test-agent');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $result = curl_exec($ch);
//        curl_close($ch);
//
//        $vacancies = json_decode($result);
//
//        foreach($vacancies->items as $vacancy) {
//            Vacancy::create([
//                'vacancy_id' => $vacancy->id,
//                'vacancy_url' => $vacancy->alternate_url,
//                'vacancy_name' => $vacancy->name,
//                'requirement' => $vacancy->snippet->requirement,
//                'responsibility' => $vacancy->snippet->responsibility,
//                'salary_from' => $vacancy->salary->from ?? null,
//                'salary_to' => $vacancy->salary->to ?? null,
//                'salary_currency' => $vacancy->salary->currency ?? null,
//                'employer_id' => $vacancy->employer->id,
//                'employer_url' => $vacancy->employer->alternate_url,
//                'employer_name' => $vacancy->employer->name,
//                'city' => $vacancy->area->name,
//            ]);
//        }
//
//        if($vacancies->pages > 0) {
//            for($i = 1; $i <= $vacancies->pages; $i++) {
//
//                DB::table('info')->insert(
//                    ['date_from' => $from, 'date_to' => $to, 'url' => "https://api.hh.ru/vacancies?page=$i&per_page=5&date_from=$from&date_to=$to"]
//                );
//
//                $ch = curl_init();
//                curl_setopt($ch, CURLOPT_URL, "https://api.hh.ru/vacancies?page=$i&per_page=5&date_from=$from&date_to=$to");
//                curl_setopt($ch, CURLOPT_USERAGENT,'User-Agent: api-test-agent');
//                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                $result = curl_exec($ch);
//                curl_close($ch);
//
//                $vacancies = json_decode($result);
//
//                foreach($vacancies->items as $vacancy) {
//                    Vacancy::create([
//                        'vacancy_id' => $vacancy->id,
//                        'vacancy_url' => $vacancy->alternate_url,
//                        'vacancy_name' => $vacancy->name,
//                        'requirement' => $vacancy->snippet->requirement,
//                        'responsibility' => $vacancy->snippet->responsibility,
//                        'salary_from' => $vacancy->salary->from ?? null,
//                        'salary_to' => $vacancy->salary->to ?? null,
//                        'salary_currency' => $vacancy->salary->currency ?? null,
//                        'employer_id' => $vacancy->employer->id,
//                        'employer_url' => $vacancy->employer->alternate_url,
//                        'employer_name' => $vacancy->employer->name,
//                        'city' => $vacancy->area->name,
//                    ]);
//                }
//            }
//        }

        $vacancies = Vacancy::orderBy('created_at', 'desc')->paginate(10);

        return view('vacancies', compact('vacancies'));
    }
}
