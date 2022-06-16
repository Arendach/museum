<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {

    $videos = \App\Models\Article::where('id', 21)->first()->videos;


    dd($videos);
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('user/{id}', [UsersController::class, 'showUser'])->name('user');
    Route::get('article/{slug}', [ArticlesController::class, 'showArticle'])->name('article');
    Route::get('tag/{slug}', [TagsController::class, 'showTag'])->name('tag');
    Route::get('country/{slug}', [CountriesController::class, 'showCountry'])->name('country');
    Route::get('weapon/{weapon}', [])->name('weapon');
});
