<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Countries\UpdateRequest;
use App\Http\Requests\Admin\Countries\CreateRequest;
use App\Http\Resources\Admin\CountryResource;
use App\Repositories\Admin\CountriesRepository;

class CountriesController extends AdminController
{
    protected string $repository = CountriesRepository::class;
    protected string $resource = CountryResource::class;
    protected string $storeRequest = CreateRequest::class;
    protected string $updateRequest = UpdateRequest::class;
    protected array $with = ['seo', 'picture'];
}
