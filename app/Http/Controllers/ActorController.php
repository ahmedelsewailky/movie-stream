<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Http\Requests\StoreActorRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateActorRequest;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.actors.index', [
            'actors' => Actor::orderByDesc('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.actors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActorRequest $request)
    {
        $input = $request->except('_token');
        if ($request->has('avatar')) {
            $input['avatar'] = $request->avatar->store('actors', 'public');
        }
        Actor::create($input);
        Alert::success('رائع', 'تمت العملية بنجاح');
        return redirect()->route('actors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        return view('dashboard.actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorRequest $request, Actor $actor)
    {
        $input = $request->except('_token');

        if ($request->has('avatar')) {
            if ($actor->avatar) {
                unlink(storage_path('app/public/') . $actor->avatar);
            }
            $input['avatar'] = $request->avatar->store('actors', 'public');
        }

        $actor->update($input);
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return redirect()->route('actors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        Alert::success('نهانينا', 'تمت العملية بنجاح');
        return back();
    }
}
