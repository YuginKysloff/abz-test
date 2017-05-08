<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function index()
    {
        $a=['my','name','is','john','doe'];

        $min = $a[0];
        foreach ($a as $key => $item) {
            if($min > $item) {
                $min = $item;
}
        }

        dump($min);

        return view('vacancies');
    }
}
