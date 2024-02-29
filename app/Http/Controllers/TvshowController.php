<?php

namespace App\Http\Controllers;

use App\Models\Tvshow;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TvshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tvshows = new Tvshow;
        $tvshows = request()->has('q') ? $tvshows->where('title', 'like', '%'.request()->get('q').'%') : $tvshows;
        $tvshows = request()->has('language') ? $tvshows->whereIn('language', request()->get('language')) : $tvshows;
        $tvshows = request()->has('year') ? $tvshows->where('year', request()->get('year')) : $tvshows;
        $tvshows = $tvshows->orderByDesc('id')->paginate(10);
        return view('tvshows.index', compact('tvshows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tvshows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->except('actors');
        $inputs['poster'] = $request->poster->store('tvshows', 'public');
        $tvshows = Tvshow::create($inputs);
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return redirect()->route('series.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tvshow $tvshow)
    {
        return view('tvshows.show', compact('tvshow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tvshow $tvshow)
    {
        return view('tvshows.edit', compact('tvshow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tvshow $tvshow)
    {
        $inputs = $request->except('actors');
        if ($request->has('poster')) {
            unlink(storage_path('app\\public\\' . $tvshow->poster ));
            $inputs['poster'] = $request->poster->store('tvshows', 'public');
        } else {
            $inputs = $request->except(['poster', 'actors']);
        }
        $tvshow->update($inputs);
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tvshow $tvshow)
    {
        if ($tvshow->poster) {
            unlink(storage_path('app\\public\\' . $tvshow->poster ));
        }
        $tvshow->delete();
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }
}
