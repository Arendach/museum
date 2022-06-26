<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Videos\AttachAction;
use App\Actions\Videos\UploadAction;
use App\Actions\Weapons\StoreAction;
use App\Actions\Weapons\DeleteAction;
use App\Actions\Weapons\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Videos\AttachRequest;
use App\Http\Requests\Admin\Videos\UploadRequest;
use App\Http\Requests\Admin\Weapons\StoreRequest;
use App\Http\Requests\Admin\Weapons\UpdateRequest;
use App\Http\Resources\Admin\VideoResource;
use App\Http\Resources\Admin\WeaponResource;
use App\Models\Video;
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

    public function index(): AnonymousResourceCollection
    {
        $videos = $this->repository->getItemsPaginate();

        return VideoResource::collection($videos);
    }

    public function upload(UploadRequest $request, UploadAction $action)
    {
        $video = $action->run($request->getModel(), $request);

        return new VideoResource($video);
    }

    public function store(StoreRequest $request, StoreAction $action): WeaponResource
    {
        $tag = $action->run($request);

        return new WeaponResource($tag);
    }

    public function show(Video $video): VideoResource
    {
        return new VideoResource($video);
    }

    public function attach(AttachRequest $request, AttachAction $action): JsonResponse
    {
        $action->run($request->getModel(), $request->getVideo());

        return $this->json([]);
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
