<?php

namespace App\Http\Controllers;

use App\Repositories\CountriesRepository;
use Illuminate\View\View;

class CountriesController extends Controller
{
    private CountriesRepository $repository;

    public function __construct(CountriesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function showCountry(string $slug): View
    {
        $country = $this->repository->findCountry($slug);

        abort_if(!$country, 404);

        return view('pages.country', compact('country'));
    }
}
