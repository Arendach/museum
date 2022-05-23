<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $articles = Article::with('tags')->limit(10)->get();
        $title = translate('Енциклопедія вільного українця');

        return view('pages.home', compact('articles', 'title'));
    }
}
