<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{TvshowEpisode, Tvshow};
use RealRashid\SweetAlert\Facades\Alert;

class TvshowEpisodeController  extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (request()->has('series_id')) {
            $tvshow = Tvshow::find(request()->get('tvshow_id'));
            return view('tvshows.episodes.create', compact('tvshow'));
        }
        abort(404);
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
     * Show the form for editing the specified resource.
     */
    public function edit(TvshowEpisode $episode)
    {
        $tvshow = Tvshow::find($episode->tvshow_id);
        return view('tvshows.episodes.edit', compact('episode', 'tvshow'));
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
