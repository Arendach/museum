<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TagResource;
use App\Repositories\TagsRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TagsController extends Controller
{
    private TagsRepository $repository;

    public function __construct(TagsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTags(): AnonymousResourceCollection
    {
        $tags = $this->repository->getAllTags();

        return TagResource::collection($tags);
    }
}
