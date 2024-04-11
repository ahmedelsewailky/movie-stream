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

Auth::routes(['register' => false, 'verify' => true]);

Route::get('/', 'WebsiteController@index')->name('website');

Route::get('movie/{slug}', 'WebsiteController@movie')
    ->name('web.movie.show');

Route::get('actors/{slug}', 'WebsiteController@actors')
    ->name('web.actor.works');

Route::get('series/{slug}', 'WebsiteController@series')
    ->name('web.series.show');

Route::get('series/{slug}/episode/{id}', 'WebsiteController@seriesEpisode')
    ->name('web.series.episode');

Route::get('category/{slug}', 'WebsiteController@category')
    ->name('web.category');

Route::get('search', 'WebsiteController@search')
    ->name('web.search');

Route::group(['middleware' => 'auth', 'prefix' => 'panel'], function () {

    Route::get('/', 'HomeController@index')
        ->name('dashboard');

    Route::resource('categories', 'CategoryController');

    Route::resource('actors', 'ActorController');

    Route::resource('movies', 'MovieController');

    Route::resource('series', 'SeriesController');

    Route::resource('tvshows', 'TvshowController');

    Route::name('series')->resource('series/episodes', 'SeriesEpisodeController');

    Route::name('tvshows')->resource('tvshows/episodes', 'TvshowEpisodeController');

    Route::group(['middleware' => 'verified','prefix' => 'profile','as' => 'profile.',], function () {
        Route::get('/', 'HomeController@profile')
            ->name('index');

        Route::post('update/avatar', 'HomeController@updateImageAvatar')
            ->name('update.avatar');

        Route::post('update/personal', 'HomeController@updatePersonalInformations')
            ->name('update.personal');

        Route::post('update/password', 'HomeController@UpdatePassword')
            ->name('update.password');

    });

});
