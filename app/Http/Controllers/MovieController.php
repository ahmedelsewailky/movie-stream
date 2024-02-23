<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DataArray;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use RealRashid\SweetAlert\Facades\Alert;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::orderByDesc('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create',[
            'categories' => \App\Models\Category::whereParentId(1)->get(),
            'actors' => \App\Models\Actor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $inputs = $request->all();
        $inputs['poster'] = $request->poster->store('movies', 'public');
        $inputs['user_id'] = auth()->user()->id;
        Movie::create($inputs);
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        // return $movie;
        return view('movies.edit',[
            'categories' => \App\Models\Category::whereParentId(1)->get(),
            'actors' => \App\Models\Actor::all(),
            'movie' => $movie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $inputs = $request->all();
        // return $inputs;
        if ($request->has('poster')) {
            unlink(storage_path('app\\public\\' . $movie->poster ));
            $inputs['poster'] = $request->poster->store('movies', 'public');
        } else {
            $inputs = $request->except('poster');
        }
        $inputs['user_id'] = auth()->user()->id;
        $movie->update($inputs);
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}