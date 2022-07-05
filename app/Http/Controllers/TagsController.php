<?php

namespace App\Http\Controllers;

use App\Actions\Tags\GetArticlesAction;
use App\Actions\Tags\GetTagAction;
use App\Actions\Tags\GetVideosAction;
use App\Http\Resources\Admin\VideoResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\TagResource;
use App\Models\Tag;
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

    public function show(string $slug): View
    {
        $page = app(GetTagAction::class)->run($slug);

        return view('tags.show', compact('page'));
    }

    public function getVideos(Tag $tag): AnonymousResourceCollection
    {
        $videos = app(GetVideosAction::class)->run($tag);

        return VideoResource::collection($videos);
    }

    public function getArticles(Tag $tag): AnonymousResourceCollection
    {
        $articles = app(GetArticlesAction::class)->run($tag);

        return ArticleResource::collection($articles);
    }
}
