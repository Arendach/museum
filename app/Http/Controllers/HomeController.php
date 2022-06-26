<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;
use App\Repositories\ArticlesRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $articles = app(ArticlesRepository::class)->getArticles();
        $title = translate('Енциклопедія вільного українця');

        $page = Page::where('slug', 'index')->firstOrFail();

        return view('pages.home', compact('page', 'articles', 'title'));
    }
}
