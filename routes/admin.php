<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PeoplesController;
use App\Http\Controllers\Admin\PicturesController;
use App\Http\Controllers\Admin\QuotesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\WeaponsController;

Route::get('me', [AuthController::class, 'me']);

Route::apiResource('articles', ArticlesController::class, [
    'as'         => 'api.admin',
    'parameters' => [
        'articles' => 'id'
    ]
]);

Route::apiResource('tags', TagsController::class, [
    'as'         => 'api.admin',
    'parameters' => [
        'tags' => 'id'
    ]
]);

Route::apiResource('weapons', WeaponsController::class, [
    'as'         => 'api.admin',
    'parameters' => [
        'weapons' => 'id'
    ]
]);

Route::apiResource('countries', CountriesController::class, [
    'as'         => 'api.admin',
    'parameters' => [
        'countries' => 'id'
    ]
]);

Route::apiResource('quotes', QuotesController::class, [
    'as'         => 'api.admin',
    'parameters' => [
        'quotes' => 'id'
    ],
    'except'     => [
        'index'
    ]
]);

Route::apiResource('peoples', PeoplesController::class, [
    'as'         => 'api.admin',
    'parameters' => [
        'peoples' => 'id'
    ]
]);

Route::apiResource('pages', PagesController::class, [
    'as'         => 'api.admin',
    'parameters' => [
        'pages' => 'id'
    ]
]);

Route::apiResource('users', UsersController::class, [
    'as'         => 'api.admin',
    'parameters' => [
        'users' => 'id'
    ]
]);

Route::get('videos', [VideosController::class, 'index']);
Route::get('videos/related', [VideosController::class, 'related'])->name('api.admin.videos.related');
Route::post('videos/upload', [VideosController::class, 'upload'])->name('api.admin.videos.upload');
Route::get('videos/{video}', [VideosController::class, 'show'])->name('api.admin.videos.show');
Route::put('videos/attach', [VideosController::class, 'attach'])->name('api.admin.video.attach');

Route::post('pictures/change', [PicturesController::class, 'change']);
Route::post('pictures/upload', [PicturesController::class, 'upload']);
