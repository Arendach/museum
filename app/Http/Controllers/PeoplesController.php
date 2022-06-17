<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\View\View;

class PeoplesController extends Controller
{
    public function index(People $people): View
    {
        $title = $people->t('name');
        $breadcrumbs = [[$title]];

        return view('pages.weapon', compact('people', 'title', 'breadcrumbs'));
    }
}
