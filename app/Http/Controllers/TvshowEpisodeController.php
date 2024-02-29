<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{TvshowEpisode, Tvshow};
use RealRashid\SweetAlert\Facades\Alert;

class TvshowEpisodeController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tvshow $tvshow)
    {
        return view('tvshows.episodes.create', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TvshowEpisode::create($request->except('_token'));
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return redirect()->route('tvshows.show', $request->series_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tvshow $episode)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tvshow $tvshow, TvshowEpisode $episode)
    {
        return view('tvshows.episodes.edit', compact('episode', 'series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TvshowEpisode $episode)
    {
        $episode->update($request->only(['episode', 'quality', 'watch_link', 'links']));
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tvshow $episode)
    {
        $episode->delete();
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }
}
