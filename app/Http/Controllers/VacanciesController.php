<?php

namespace App\Http\Controllers;

use App\Parser;
use App\Vacancy;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function index()
    {
        $data['parser'] = Parser::where('id', 1)->first();
        $data['vacancies'] = Vacancy::orderBy('created_at', 'desc')->paginate(10);
        return view('vacancies', compact('data'));
    }

    public function toggleStatus(Request $request)
    {
        // Validate status
        $status = ($request->status) ? 1 : 0;

        $parser = Parser::where('id',1)->first();
        $parser->status = $status;
        $parser->save();

        $data = [
            'status' => ($request->status) ? 0 : 1,
            'sessions' => $parser->sessions,
            'updated_at' => date('d-m-Y H:i:s', strtotime($parser->updated_at))
        ];

        return response()->json($data);
    }
}
