<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticlesController extends Controller
{
    private ArticlesRepository $repository;

    public function __construct(ArticlesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getArticles(): AnonymousResourceCollection
    {
        $articles = $this->repository->getArticles();

        return ArticleResource::collection($articles);
    }

    public function getArticle(int $id): ArticleResource
    {
        $article = $this->repository->getArticle($id);

        return new ArticleResource($article);
    }
}
