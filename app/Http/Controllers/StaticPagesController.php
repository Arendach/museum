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
}
