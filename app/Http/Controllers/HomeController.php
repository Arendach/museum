<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Quote;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $articles = Article::with('tags')->get();
        $quote = Quote::with('people')->inRandomOrder()->first();
        $title = translate('Енциклопедія вільного українця');

        return view('pages.home', compact('articles', 'quote', 'title'));
    }
}
