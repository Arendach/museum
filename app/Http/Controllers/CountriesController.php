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

    public function index(Country $country): View
    {
        $country->load('weapons', 'peoples', 'weapons.picture', 'peoples.picture');

        $title = $country->t('title');
        $breadcrumbs = [[$title]];

        return view('pages.country', compact('country', 'title', 'breadcrumbs'));
    }
}
