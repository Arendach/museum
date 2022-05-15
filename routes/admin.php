<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\TagsController;

Route::get('articles', [ArticlesController::class, 'getArticles']);
Route::get('article/{id}', [ArticlesController::class, 'getArticle']);
Route::put('article/{id}', [ArticlesController::class, 'update']);

Route::get('tags', [TagsController::class, 'getTags']);
