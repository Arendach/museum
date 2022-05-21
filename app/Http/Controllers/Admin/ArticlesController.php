<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Articles\UpdateRequest;
use App\Http\Resources\Admin\ArticleResource;
use App\Models\Article;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\JsonResponse;
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

    public function update(UpdateRequest $request, int $id)
    {
        $article = $this->repository->getArticle($id);

        $article->update($request->getData());

        $article->tags()->sync($request->getTags());

        return response()->json([
            'success' => true
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        Article::where('id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
