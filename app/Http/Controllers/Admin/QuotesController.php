<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Quotes\StoreRequest;
use App\Http\Requests\Admin\Quotes\UpdateRequest;
use App\Http\Resources\Admin\QuoteResource;
use App\Repositories\QuotesRepository;

class QuotesController extends AdminController
{
    protected string $repository = QuotesRepository::class;
    protected string $resource = QuoteResource::class;
    protected string $updateRequest = UpdateRequest::class;
    protected string $storeRequest = StoreRequest::class;
}
