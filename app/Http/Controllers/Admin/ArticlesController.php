<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Articles\ChangePictureAction;
use App\Actions\Articles\CreateAction;
use App\Actions\Articles\DeleteAction;
use App\Actions\Articles\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Articles\ChangePictureRequest;
use App\Http\Requests\Admin\Articles\CreateRequest;
use App\Http\Requests\Admin\Articles\UpdateRequest;
use App\Http\Resources\Admin\ArticleResource;
use App\Http\Resources\Admin\PictureResource;
use App\Models\Article;
use App\Repositories\Admin\ArticlesRepository;
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

    public function getArticle(Article $article): ArticleResource
    {
        $article->load('user', 'tags', 'picture');

        return new ArticleResource($article);
    }

    public function create(CreateRequest $request, CreateAction $action): ArticleResource
    {
        $article = $action->run($request);

        return new ArticleResource($article);
    }

    public function update(Article $article, UpdateAction $action, UpdateRequest $request)
    {
        $success = $action->run($article, $request);

        return $this->json(compact('success'));
    }

    public function delete(Article $article, DeleteAction $action): JsonResponse
    {
        $success = $action->run($article);

        return $this->json(compact('success'));
    }

    public function changePicture(Article $article, ChangePictureAction $action, ChangePictureRequest $request): PictureResource
    {
        $picture = $action->run($article, $request);

        return new PictureResource($picture);
    }
}
