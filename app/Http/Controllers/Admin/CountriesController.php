<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Countries\UpdateAction;
use App\Actions\Countries\DeleteAction;
use App\Actions\Countries\CreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Countries\UpdateRequest;
use App\Http\Requests\Admin\Countries\CreateRequest;
use App\Http\Resources\Admin\CountryResource;
use App\Http\Resources\Admin\QuoteResource;
use App\Models\Country;
use App\Repositories\Admin\CountriesRepository;
use Illuminate\Http\JsonResponse;
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
        $countries = $this->repository->getItems();

        return CountryResource::collection($countries);
    }

    public function getCountry(Country $country): CountryResource
    {
        return new CountryResource($country);
    }

    public function create(CreateRequest $request, CreateAction $action): QuoteResource
    {
        $country = $action->run($request);

        return new QuoteResource($country);
    }

    public function update(Country $country, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        $success = $action->run($country, $request);

        return $this->json(compact('success'));
    }

    public function delete(DeleteAction $action, Country $country): JsonResponse
    {
        $success = $action->run($country);

        return $this->json(compact('success'));
    }
}
