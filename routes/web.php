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

    Route::group([
        'prefix' => 'episodes',
        'as' => 'episodes.'
    ], function() {
        Route::get('create/{series}', 'EpisodeController@create')
            ->name('create');

        Route::post('store', 'EpisodeController@store')
            ->name('store');
    });
});
