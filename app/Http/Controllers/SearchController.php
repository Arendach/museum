<?php

namespace App\Http\Controllers;

use App\Actions\Search\SearchAction;
use App\Http\Resources\SearchResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(): View
    {
        return view('');
    }

    public function search(): AnonymousResourceCollection
    {
        $result = app(SearchAction::class)->run();

        return SearchResource::collection($result);
    }
}
