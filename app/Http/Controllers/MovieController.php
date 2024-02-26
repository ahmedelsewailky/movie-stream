<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieActor;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\{UpdateMovieRequest, StoreMovieRequest};

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::orderByDesc('id')->paginate(10)
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
        $inputs = $request->except('actors');
        $inputs['poster'] = $request->poster->store('movies', 'public');
        $movie = Movie::create($inputs);
        if ($movie) {
            foreach ($request->actors as $movieActor) {
                DB::table('movie_actor')->insert([
                    'movie_id' => $movie->id,
                    'actor_id' => $movieActor
                ]);
            }
        }
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
        return view('movies.edit',[
            'categories' => \App\Models\Category::whereParentId(1)->get(),
            'actors' => \App\Models\Actor::all(),
            'movie' => $movie,
            'movieActors' => DB::table('movie_actor')->where('movie_id', $movie->id)->pluck('actor_id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $inputs = $request->except('actors');
        if ($request->has('poster')) {
            unlink(storage_path('app\\public\\' . $movie->poster ));
            $inputs['poster'] = $request->poster->store('movies', 'public');
        } else {
            $inputs = $request->except('poster', 'actors');
        }
        $movie->update($inputs);
        DB::table('movie_actor')->where('movie_id', $movie->id)->delete();
        foreach ($request->actors as $movieActor) {
            DB::table('movie_actor')->insert([
                'movie_id' => $movie->id,
                'actor_id' => $movieActor
            ]);
        }
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->poster) {
            unlink(storage_path('app\\public\\' . $movie->poster ));
        }
        $movie->delete();
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }
}
