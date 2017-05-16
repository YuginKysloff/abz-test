<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeblavController extends Controller
{
    public function rss()
    {
        $rss = file_get_contents('https://habrahabr.ru/rss/interesting/');
        $rss = simplexml_load_string($rss);
        return view('rss', compact('rss'));
    }
}
