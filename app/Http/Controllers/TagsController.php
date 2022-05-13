<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
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
        $tags = $this->repository->getTags();

        return TagResource::collection($tags);
    }
}
