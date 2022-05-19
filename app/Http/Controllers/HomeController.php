<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Country;
use App\Models\Tag;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $articles = Article::all();
        $tags = Tag::all();
        $countries = Country::all();

        return view('pages.home', compact('articles', 'tags', 'countries'));
    }
}
