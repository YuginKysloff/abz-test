<?php

namespace App\Http\Controllers;

use App\Parser;
use App\Vacancy;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function index()
    {
        $data['parser'] = Parser::where('status', 1)->first();
        $data['vacancies'] = Vacancy::orderBy('created_at', 'desc')->paginate(10);
        return view('vacancies', compact('data'));
    }

    public function toggleStatus(Request $request)
    {
        $status = ($request->status) ? true : false;
        config(['parser.status' => $status]);
        return response()->json(['status' => $status]);
    }
}
