<?php

namespace App\Http\Controllers;

use App\Parser;
use App\Vacancy;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    /**
     * Vacanciesw list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $parser = Parser::where('id', 1)->first();
        return view('vacancies', compact('parser'));
    }

    public function getVacancies(Request $request)
    {
        $searchPhrase = $request->search['value'];
        $orderColumn = $request->columns[$request->order[0]['column']]['name'];
        $orderDirection = $request->order[0]['dir'];

        //Generate api answer
        $answer['draw'] = $request->draw;

        // Get vacancies list with pagination, ordering and searching
        $answer['data'] = Vacancy::when($searchPhrase, function($query) use($searchPhrase) {
            return $query->where('city', 'like', '%'.$searchPhrase.'%');
        })->
        orderBy($orderColumn, $orderDirection)->
        limit($request->length)->
        offset($request->start)->
        get();

        // Count total records
        $answer['recordsTotal'] = Vacancy::count();

        // Count records involved in query
        $answer['recordsFiltered'] = Vacancy::when($searchPhrase, function($query) use($searchPhrase) {
            return $query->where('city', 'like', '%'.$searchPhrase.'%');
        })->count();

        return response()->json($answer);
    }

    /**
     * Toggle parser status
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
