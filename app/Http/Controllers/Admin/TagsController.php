<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Tags\UpdateAction;
use App\Http\Requests\Admin\Tags\CreateRequest;
use App\Http\Requests\Admin\Tags\UpdateRequest;
use App\Http\Resources\Admin\TagResource;
use App\Repositories\Admin\TagsRepository;

class TagsController extends AdminController
{
    protected string $repository = TagsRepository::class;
    protected string $resource = TagResource::class;
    protected string $storeRequest = CreateRequest::class;
    protected string $updateRequest = UpdateRequest::class;
    protected string $updateAction = UpdateAction::class;
    protected array $with = ['countries', 'weapons', 'seo'];
}
