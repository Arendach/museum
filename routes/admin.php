<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\TagsController;

Route::get('articles', [ArticlesController::class, 'getArticles'])->name('api.admin.articles');
Route::get('article/{id}', [ArticlesController::class, 'getArticle'])->name('api.admin.article');
Route::put('article/{id}', [ArticlesController::class, 'update'])->name('api.admin.article.update');

Route::get('tags', [TagsController::class, 'getTags'])->name('api.admin.tags');

Route::get('countries', [CountriesController::class, 'getCountries'])->name('api.admin.countries');
