<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', [ArticlesController::class, 'getArticles'])->name('api.articles');
Route::get('article/{id}', [ArticlesController::class, 'getArticle'])->name('api.article');

Route::get('tags', [TagsController::class, 'getTags'])->name('api.tags');
Route::get('tags/{tag}/videos', [TagsController::class, 'getVideos']);
Route::get('tags/{tag}/articles', [TagsController::class, 'getArticles']);

Route::get('search', [SearchController::class, 'search']);
