<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class WebsiteController extends Controller
{
    public function index()
    {
        $movies = Movie::orderByDesc('id')->take(8)->get();
        return view('index', get_defined_vars());
    }
}
