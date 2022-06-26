<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Repositories\CountriesRepository;
use Illuminate\View\View;

class CountriesController extends Controller
{
    private CountriesRepository $repository;

    public function __construct(CountriesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Country $page): View
    {
        $page->load('weapons', 'peoples', 'weapons.picture', 'peoples.picture', 'seo');

        $title = $page->t('title');
        $breadcrumbs = [[$title]];

        return view('pages.country', compact('page', 'title', 'breadcrumbs'));
    }
}
