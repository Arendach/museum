<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticlesRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $articles = app(ArticlesRepository::class)->getArticles();
        $title = translate('Енциклопедія вільного українця');

        return view('pages.home', compact('articles', 'title'));
    }
}
