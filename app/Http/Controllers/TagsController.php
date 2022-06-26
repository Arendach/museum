<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Repositories\TagsRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\View\View;

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

    public function index(string $slug): View
    {
        $page = $this->repository->findTag($slug);

        abort_if(!$page, 404);

        return view('pages.tag', compact('page'));
    }
}
