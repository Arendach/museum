<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Basic\DestroyAction;
use App\Actions\Basic\StoreAction;
use App\Actions\Basic\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use App\Repositories\Admin\AdminRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminController extends Controller
{
    protected string $repository = AdminRepository::class;
    protected string $resource = JsonResource::class;
    protected string $storeAction = StoreAction::class;
    protected string $storeRequest = ApiRequest::class;
    protected string $updateAction = UpdateAction::class;
    protected string $updateRequest = ApiRequest::class;
    protected string $destroyAction = DestroyAction::class;
    protected array $with = [];
    protected bool $isPagination = false;

    public function index(): AnonymousResourceCollection
    {
        if ($this->isPagination) {
            $items = app($this->repository)
                ->with($this->with())
                ->getItemsPaginate();
        } else {
            $items = app($this->repository)
                ->with($this->with())
                ->getItems();
        }

        return $this->resource::collection($items);
    }

    public function store(): JsonResource
    {
        if ($this->storeAction === StoreAction::class) {
            $item = app($this->storeAction)->run(
                app($this->repository)->getModel(),
                app($this->storeRequest)
            )->load($this->with);
        } else {
            $item = app($this->storeAction)->run(
                app($this->storeRequest)
            )->load($this->with);
        }

        return new $this->resource($item);
    }

    public function show(): JsonResource
    {
        $item = app($this->repository)
            ->with($this->with())
            ->findItemOrFail();

        return new $this->resource(
            $item
        );
    }

    public function update(): JsonResponse
    {
        $item = app($this->repository)
            ->with($this->with())
            ->findItemOrFail();

        $success = app($this->updateAction)->run(
            $item,
            app($this->updateRequest)
        );

        return $this->json(compact('success'));
    }

    public function destroy(): JsonResponse
    {
        $item = app($this->repository)->findItemOrFail();

        $success = app($this->destroyAction)->run($item);

        return $this->json(compact('success'));
    }

    public function with(): array
    {
        return $this->with;
    }
}
