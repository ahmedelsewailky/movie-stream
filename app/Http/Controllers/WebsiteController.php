<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Tvshow;
use App\Models\TvshowEpisode;

class WebsiteController extends Controller
{
    public function index()
    {
        $movies = Movie::orderByDesc('id')->take(8)->get();
        $tvshows = TvshowEpisode::orderByDesc('id')->take(5)->get();
        return view('index', get_defined_vars());
    }
}
