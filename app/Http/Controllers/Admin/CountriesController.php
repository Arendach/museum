<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CountryResource;
use App\Repositories\CountriesRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountriesController extends Controller
{
    private CountriesRepository $repository;

    public function __construct(CountriesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCountries(): AnonymousResourceCollection
    {
        $countries = $this->repository->getCountries();

        return CountryResource::collection($countries);
    }
}
