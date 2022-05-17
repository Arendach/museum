<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::get('user/{id}', [UsersController::class, 'showUser'])->name('user');
Route::get('article/{slug}', [ArticlesController::class, 'showArticle'])->name('article');
Route::get('tag/{slug}', [TagsController::class, 'showTag'])->name('tag');
