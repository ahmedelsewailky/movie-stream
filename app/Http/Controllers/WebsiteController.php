<?php

namespace App\Http\Controllers;

use App\Models\{Movie, TvshowEpisode, SeriesEpisode};

class WebsiteController extends Controller
{
    public function index()
    {
        $movies = Movie::orderByDesc('id')->take(8)->get();
        $tvshows = TvshowEpisode::orderByDesc('id')->take(5)->get();
        $series = SeriesEpisode::orderByDesc('id')->take(10)->get();
        return view('index', get_defined_vars());
    }

    public function show($post_identifier)
    {
        $request_array = explode('/', trim(request()->getRequestUri()));
        $request_array = array_slice($request_array, 0, count($request_array) - 1);
        // $request_array = array_filter($request_arrady, 'strlen');
        // $request_array = ucfirst($request_array[1]) . ucfirst($request_array[count($request_array)]);
        return $request_array;
    }
}
