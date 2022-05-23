<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\PeoplesController;
use App\Http\Controllers\Admin\QuotesController;
use App\Http\Controllers\Admin\TagsController;

Route::get('articles', [ArticlesController::class, 'getArticles'])->name('api.admin.articles');
Route::get('article/{id}', [ArticlesController::class, 'getArticle'])->name('api.admin.article');
Route::put('article/{id}', [ArticlesController::class, 'update'])->name('api.admin.article.update');

Route::get('tags', [TagsController::class, 'getTags'])->name('api.admin.tags');

Route::get('countries', [CountriesController::class, 'getCountries'])->name('api.admin.countries');

Route::get('quotes', [QuotesController::class, 'getQuotes'])->name('api.admin.quotes');
Route::get('quote/{quote}', [QuotesController::class, 'getQuote'])->name('api.admin.quote');
Route::put('quote/{quote}', [QuotesController::class, 'update'])->name('api.admin.quote.update');
Route::delete('quote/{quote}', [QuotesController::class, 'delete'])->name('api.admin.quote.delete');

Route::get('peoples', [PeoplesController::class, 'getPeoples'])->name('api.admin.peoples');
Route::get('people/{people}', [PeoplesController::class, 'getPeople'])->name('api.admin.people');
Route::put('people/{people}', [PeoplesController::class, 'update'])->name('api.admin.people.update');
Route::delete('people/{people}', [PeoplesController::class, 'delete'])->name('api.admin.people.delete');
