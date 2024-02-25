<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Episode;
use App\Http\Requests\{UpdateEpisodeRequest, StoreEpisodeRequest};
use RealRashid\SweetAlert\Facades\Alert;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('episodes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Series $series)
    {
        return view('episodes.create', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEpisodeRequest $request)
    {
        Episode::create($request->except('_token'));
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return redirect()->route('series.show', $request->series_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Episode $episode, Series $series)
    {
        return view('episodes.edit', compact('episode', 'series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        $episode->update($request->only(['episode', 'quality', 'watch_link', 'links']));
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episode $episode)
    {
        $episode->delete();
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }
}
