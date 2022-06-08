<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\View\View;

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

    public function showArticle(string $slug): View
    {
        $article = $this->repository->findArticle($slug);

        abort_if(!$article, 404);

        $breadcrumbs = [[$article->t('title')]];

        return view('pages.article', compact('article', 'breadcrumbs'));
    }
}
