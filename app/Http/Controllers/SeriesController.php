<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\{StoreSeriesRequest, UpdateSeriesRequest};

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = new Series;
        $series = request()->has('q') ? $series->where('title', 'like', '%'.request()->get('q').'%') : $series;
        $series = request()->has('category') ? $series->whereIn('category_id',request()->get('category')) : $series;
        $series = request()->has('language') ? $series->whereIn('language', request()->get('language')) : $series;
        $series = request()->has('year') ? $series->where('year', request()->get('year')) : $series;
        $series = $series->orderByDesc('id')->paginate(10);
        return view('series.index', compact('series'));
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
        $inputs = $request->except('actors');
        $inputs['poster'] = $request->poster->store('series', 'public');
        $series = Series::create($inputs);
        if ($series) {
            foreach ($request->actors as $actor) {
                DB::table('series_actor')->insert([
                    'series_id' => $series->id,
                    'actor_id' => $actor
                ]);
            }
        }
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
        $inputs = $request->except('actors');
        if ($request->has('poster')) {
            if ($series->poster)
                unlink(storage_path('app\\public\\' . $series->poster ));
            $inputs['poster'] = $request->poster->store('series', 'public');
        } else {
            $inputs = $request->except(['poster', 'actors']);
        }
        $series->update($inputs);
        DB::table('series_actor')->where('series_id', $series->id)->delete();
        foreach ($request->actors as $actor) {
            DB::table('series_actor')->insert([
                'series_id' => $series->id,
                'actor_id' => $actor
            ]);
        }
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
