<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Articles\StoreAction;
use App\Actions\Articles\UpdateAction;
use App\Http\Requests\Admin\Articles\StoreRequest;
use App\Http\Requests\Admin\Articles\UpdateRequest;
use App\Http\Resources\Admin\ArticleResource;
use App\Repositories\Admin\ArticlesRepository;

class ArticlesController extends AdminController
{
    protected string $repository = ArticlesRepository::class;
    protected string $resource = ArticleResource::class;
    protected string $storeRequest = StoreRequest::class;
    protected string $storeAction = StoreAction::class;
    protected string $updateRequest = UpdateRequest::class;
    protected string $updateAction = UpdateAction::class;
    protected array $with = ['user', 'tags', 'picture', 'videos', 'seo'];
    protected bool $isPagination = true;
}
