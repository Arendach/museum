<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Users\StoreRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Http\Resources\Admin\UserResource;
use App\Repositories\Admin\UsersRepository;

class UsersController extends AdminController
{
    protected string $repository = UsersRepository::class;
    protected string $resource = UserResource::class;
    protected string $storeRequest = StoreRequest::class;
    protected string $updateRequest = UpdateRequest::class;
    protected array $with = [];
    protected bool $isPagination = true;
}
