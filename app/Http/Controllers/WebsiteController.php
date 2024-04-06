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

        $episodes = SeriesEpisode::orderByDesc('id')->take(10)->get();

        $movies = Movie::orderByDesc('id')->paginate(18);

        return view('index', get_defined_vars());
    }

    public function actors(string $slug)
    {
        $actor = \App\Models\Actor::where('slug', $slug)->first();
        return view('actor-works', compact('actor'));
    }

    public function movie(string $slug)
    {
        $movie = \App\Models\Movie::where('slug', $slug)->first();
        $movie_actors = DB::table('movie_actor')->where('movie_id', $movie->id)->get();
        return view('movies.single', compact('movie', 'movie_actors'));
    }

    public function series(string $slug)
    {
        return view('series.single', [
            'series' => \App\Models\Series::where('slug', $slug)->first()
        ]);
    }

    public function seriesEpisode(string $slug, int $id)
    {
        $episode = \App\Models\SeriesEpisode::find($id)->first();
        $series = \App\Models\Series::where('slug', $slug)->first();
        return view('series.single-episode', compact('episode', 'series'));
    }
}
