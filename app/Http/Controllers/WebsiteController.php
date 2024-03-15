<?php

namespace App\Http\Controllers;

use App\Models\{Movie, TvshowEpisode, SeriesEpisode};

class WebsiteController extends Controller
{
    /**
     * Display website index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $movies = Movie::orderByDesc('id')->take(8)->get();

        $tvshows = TvshowEpisode::orderByDesc('id')->take(5)->get();

        $series = SeriesEpisode::orderByDesc('id')->take(10)->get();

        return view('index', get_defined_vars());
    }

    /**
     * Display single post page based on uri.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show($post_identifier)
    {
        $request_uri = explode('/', trim(request()->getRequestUri()));

        if ($request_uri[1] == 'movie') {
            $post = \App\Models\Movie::where('slug', $post_identifier)->first();
        }

        if ($request_uri[1] == 'series') {
            $post = \App\Models\SeriesEpisode::where('episode', $post_identifier)->first();
        }

        if ($request_uri[1] == 'tvshow') {
            $post = \App\Models\TvshowEpisode::where('episode', $post_identifier)->first();
        }
        return view('singles.' . $request_uri[1] . '-single', compact('post'));
    }
}
