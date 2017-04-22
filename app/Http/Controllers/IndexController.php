<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;

class IndexController extends Controller
{
    public function index()
    {

        $data['workers'] = Worker::with('post')->whereIn('pid', [0,1])->get();

        return view('tree', $data);
    }

}