<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Tags\CreateAction;
use App\Actions\Tags\DeleteAction;
use App\Actions\Tags\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\CreateRequest;
use App\Http\Requests\Admin\Tags\UpdateRequest;
use App\Http\Resources\Admin\TagResource;
use App\Models\Tag;
use App\Repositories\Admin\TagsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TagsController extends Controller
{
    private TagsRepository $repository;

    public function __construct(TagsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): AnonymousResourceCollection
    {
        $tags = $this->repository->getTags();

        return TagResource::collection($tags);
    }

    public function store(CreateRequest $request, CreateAction $action): TagResource
    {
        $tag = $action->run($request);

        return new TagResource($tag);
    }

    public function show(Tag $tag): TagResource
    {
        return new TagResource($tag);
    }

    public function update(Tag $tag, UpdateRequest $request, UpdateAction $action)
    {
        $success = $action->run($tag, $request);

        return $this->json(compact('success'));
    }

    public function destroy(Tag $tag, DeleteAction $action): JsonResponse
    {
        $success = $action->run($tag);

        return $this->json(compact('success'));
    }
}
