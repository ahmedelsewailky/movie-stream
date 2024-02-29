<?php

namespace App\Http\Controllers;

use App\Models\{SeriesEpisode, Series};
use App\Http\Requests\{UpdateSeriesEpisodeRequest, StoreSeriesEpisodeRequest};
use RealRashid\SweetAlert\Facades\Alert;

class SeriesEpisodeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (request()->has('series_id')) {
            $series = Series::find(request()->get('series_id'));
            return view('series.episodes.create', compact('series'));
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeriesEpisodeRequest $request)
    {
        SeriesEpisode::create($request->except('_token'));
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return redirect()->route('series.show', $request->series_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeriesEpisode $episode)
    {
        $series = Series::find($episode->series_id);
        return view('series.episodes.edit', compact('episode', 'series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeriesEpisodeRequest $request, SeriesEpisode $episode)
    {
        $episode->update($request->only(['episode', 'quality', 'watch_link', 'links']));
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeriesEpisode $episode)
    {
        $episode->delete();
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }
}
