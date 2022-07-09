<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Pages\StoreRequest;
use App\Http\Requests\Admin\Pages\UpdateRequest;
use App\Http\Resources\Admin\PageResource;
use App\Repositories\Admin\PagesRepository;

class PagesController extends AdminController
{
    protected string $repository = PagesRepository::class;
    protected string $resource = PageResource::class;
    protected string $storeRequest = StoreRequest::class;
    protected string $updateRequest = UpdateRequest::class;
    protected array $with = ['picture', 'seo', 'videos'];
    protected bool $isPagination = true;
}
