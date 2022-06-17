<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\PeoplesController;
use App\Http\Controllers\Admin\PicturesController;
use App\Http\Controllers\Admin\QuotesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\WeaponsController;

Route::get('articles', [ArticlesController::class, 'getArticles'])->name('api.admin.articles');
Route::get('articles/{article}', [ArticlesController::class, 'getArticle'])->name('api.admin.article');
Route::put('articles/{article}', [ArticlesController::class, 'update'])->name('api.admin.article.update');
Route::post('articles', [ArticlesController::class, 'create'])->name('api.admin.article.create');
Route::delete('articles/{article}', [ArticlesController::class, 'delete'])->name('api.admin.article.delete');
Route::post('articles/change-picture/{article}', [ArticlesController::class, 'changePicture'])->name('api.admin.article.change-picture');

Route::apiResource('tags', TagsController::class, ['as' => 'api.admin']);
Route::apiResource('weapons', WeaponsController::class, ['as' => 'api.admin']);

Route::get('countries', [CountriesController::class, 'getCountries'])->name('api.admin.countries');
Route::get('country/{country}', [CountriesController::class, 'getCountry'])->name('api.admin.country');
Route::put('country/{country}', [CountriesController::class, 'update'])->name('api.admin.country.update');
Route::delete('country/{country}', [CountriesController::class, 'delete'])->name('api.admin.country.delete');
Route::post('country', [CountriesController::class, 'create'])->name('api.admin.country.create');

Route::get('quotes', [QuotesController::class, 'getQuotes'])->name('api.admin.quotes');
Route::get('quote/{quote}', [QuotesController::class, 'getQuote'])->name('api.admin.quote');
Route::put('quote/{quote}', [QuotesController::class, 'update'])->name('api.admin.quote.update');
Route::delete('quote/{quote}', [QuotesController::class, 'delete'])->name('api.admin.quote.delete');
Route::post('quote/create', [QuotesController::class, 'create'])->name('api.admin.quote.create');

Route::get('peoples', [PeoplesController::class, 'getPeoples'])->name('api.admin.peoples');
Route::get('peoples/{people}', [PeoplesController::class, 'getPeople'])->name('api.admin.people');
Route::put('people/{people}', [PeoplesController::class, 'update'])->name('api.admin.people.update');
Route::delete('people/{people}', [PeoplesController::class, 'delete'])->name('api.admin.people.delete');
Route::post('people/create', [PeoplesController::class, 'create'])->name('api.admin.people.create');

Route::get('videos', [VideosController::class, 'index']);
Route::get('videos/related', [VideosController::class, 'related'])->name('api.admin.videos.related');

Route::post('pictures/change', [PicturesController::class, 'change']);
