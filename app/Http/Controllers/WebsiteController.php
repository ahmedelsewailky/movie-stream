<?php

namespace App\Http\Controllers;

use App\Models\{Movie, TvshowEpisode, SeriesEpisode};
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    /**
     * Display website index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $slider_movies = Movie::orderByDesc('id')->take(5)->get();

        $tvshows = TvshowEpisode::orderByDesc('id')->take(5)->get();

        $series = SeriesEpisode::orderByDesc('id')->take(10)->get();

        $movies = Movie::orderByDesc('id')->paginate(18);

        return view('index', get_defined_vars());
    }

    public function movie(string $slug)
    {
        $movie = \App\Models\Movie::where('slug', $slug)->first();
        $movie_actors = DB::table('movie_actor')->where('movie_id', $movie->id)->get();
        return view('movies.single', compact('movie', 'movie_actors'));
    }

    public function series(string $slug)
    {
        $series = \App\Models\Series::where('slug', $slug)->first();
        $series_actors = DB::table('series_actor')->where('series_id', $series->id)->get();
        return view('series.single', compact('series', 'series_actors'));
    }
}
