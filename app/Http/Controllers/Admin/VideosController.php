<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Weapons\CreateAction;
use App\Actions\Weapons\DeleteAction;
use App\Actions\Weapons\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Weapons\CreateRequest;
use App\Http\Requests\Admin\Weapons\UpdateRequest;
use App\Http\Resources\Admin\VideoResource;
use App\Http\Resources\Admin\WeaponResource;
use App\Models\Weapon;
use App\Repositories\Admin\VideosRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VideosController extends Controller
{
    private VideosRepository $repository;

    public function __construct(VideosRepository $repository)
    {
        $this->repository = $repository;
    }

    public function related()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $videos = $this->repository->getItemsPaginate();

        return VideoResource::collection($videos);
    }

    public function store(CreateRequest $request, CreateAction $action): WeaponResource
    {
        $tag = $action->run($request);

        return new WeaponResource($tag);
    }

    public function show(Weapon $weapon): WeaponResource
    {
        $weapon->load('picture', 'countries');

        return new WeaponResource($weapon);
    }

    public function update(Weapon $weapon, UpdateRequest $request, UpdateAction $action)
    {
        $success = $action->run($weapon, $request);

        return $this->json(compact('success'));
    }

    public function destroy(Weapon $weapon, DeleteAction $action): JsonResponse
    {
        $success = $action->run($weapon);

        return $this->json(compact('success'));
    }
}
