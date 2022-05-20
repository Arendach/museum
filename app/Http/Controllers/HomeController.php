<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Country;
use App\Models\Quote;
use App\Models\Tag;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $articles = Article::with('tags')->get();
        $tags = Tag::all();
        $countries = Country::all();
        $quote = Quote::with('people')->inRandomOrder()->first();

        return view('pages.home', compact('articles', 'tags', 'countries', 'quote'));
    }
}
