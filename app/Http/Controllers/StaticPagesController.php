<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StaticPagesController extends Controller
{
    public function notFoundSource(): View
    {
        $title = translate('Невідоме джерело');
        $breadcrumbs = [[$title]];

        return view('static-pages.not-found-source', compact('title', 'breadcrumbs'));
    }

    public function dev(): View
    {
        $title = translate('Дана сторінка в розробці');
        $breadcrumbs = [[$title]];

        return view('static-pages.dev', compact('title', 'breadcrumbs'));
    }
}
