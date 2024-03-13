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
        if (request()->has('movie')) {
            $model = 'Movie';
        } else {
            $model = request()->getRequestUri();
        }

        return $model;
    }
}
