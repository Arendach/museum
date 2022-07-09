<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeoplesController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\WeaponsController;
use Illuminate\Support\Facades\Route;

Route::post('api/admin/register', [AuthController::class, 'register']);
Route::post('api/admin/login', [AuthController::class, 'login']);

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    //Route::get('user/{id}', [UsersController::class, 'showUser'])->name('user');
    Route::get('article/{slug}', [ArticlesController::class, 'index'])->name('article');
    Route::get('tag/{slug}', [TagsController::class, 'show'])->name('tag');
    Route::get('country/{page:slug}', [CountriesController::class, 'index'])->name('country');
    Route::get('weapon/{page:slug}', [WeaponsController::class, 'index'])->name('weapon');
    Route::get('people/{people}', [PeoplesController::class, 'index'])->name('people');
    Route::get('video/{name}@{id}', [VideosController::class, 'index'])->name('video');
    Route::get('page/{slug}', [StaticPagesController::class, 'dev'])->name('page');
    Route::get('user/{name}@{id}', [StaticPagesController::class, 'dev'])->name('user');

    // static
    Route::get('pages/not-found-source', [StaticPagesController::class, 'notFoundSource'])
        ->name('pages.not-found-source');
});
