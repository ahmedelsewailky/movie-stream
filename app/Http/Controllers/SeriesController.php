<?php

namespace App\Http\Controllers;

use App\Models\Series;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\{StoreSeriesRequest, UpdateSeriesRequest};

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('series.index', [
            'series' => Series::orderByDesc('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series.create',[
            'categories' => \App\Models\Category::whereParentId(2)->get(),
            'actors' => \App\Models\Actor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeriesRequest $request)
    {
        $inputs = $request->all();
        $inputs['poster'] = $request->poster->store('series', 'public');
        Series::create($inputs);
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return redirect()->route('series.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        return view('series.show', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        return view('series.edit',[
            'categories' => \App\Models\Category::whereParentId(2)->get(),
            'actors' => \App\Models\Actor::all(),
            'series' => $series
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeriesRequest $request, Series $series)
    {
        $inputs = $request->all();
        if ($request->has('poster')) {
            unlink(storage_path('app\\public\\' . $series->poster ));
            $inputs['poster'] = $request->poster->store('series', 'public');
        } else {
            $inputs = $request->except('poster');
        }
        $series->update($inputs);
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {
        if ($series->poster) {
            unlink(storage_path('app\\public\\' . $series->poster ));
        }
        $series->delete();
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }
}
