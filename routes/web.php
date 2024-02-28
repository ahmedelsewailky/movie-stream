<?php

use Illuminate\Support\Facades\{Auth, Route};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false]);

Route::view('/', 'welcome');

Route::group(['middleware' => 'auth', 'prefix' => 'panel'], function() {

    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::resource('categories', 'CategoryController');

    Route::resource('actors', 'ActorController');

    Route::resource('movies', 'MovieController');

    Route::resource('series', 'SeriesController');

    Route::get('series/{series}/episodes/create', 'EpisodeController@create')
        ->name('series.episodes.create');

    Route::post('series/episodes/store', 'EpisodeController@store')
        ->name('series.episodes.store');

    Route::get('series/{series}/episode/{episode}/edit/', 'EpisodeController@edit')
        ->name('series.episodes.edit');

    Route::put('series/episodes/{episode}/update', 'EpisodeController@update')
        ->name('series.episodes.update');

    Route::delete('series/episodes/{episode}', 'EpisodeController@destroy')
        ->name('series.episodes.destroy');

    Route::resource('tvshows', 'SeriesController');
});
