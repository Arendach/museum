<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Articles\UpdateRequest;
use App\Http\Resources\Admin\ArticleResource;
use App\Http\Resources\Admin\QuoteResource;
use App\Models\Article;
use App\Repositories\QuotesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuotesController extends Controller
{
    private QuotesRepository $repository;

    public function __construct(QuotesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getQuotes(): AnonymousResourceCollection
    {
        $articles = $this->repository->getQuotes();

        return QuoteResource::collection($articles);
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
