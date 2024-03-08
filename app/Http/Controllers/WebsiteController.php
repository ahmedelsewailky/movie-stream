<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class WebsiteController extends Controller
{
    public function index()
    {
        $movies = Movie::orderByDesc('id')->get();
        return view('index', get_defined_vars());
    }
}
