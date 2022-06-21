<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Pictures\ChangeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pictures\ChangeRequest;
use App\Http\Requests\Admin\Pictures\UploadRequest;
use App\Http\Resources\Admin\PictureResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;

class PicturesController extends Controller
{
    public function change(ChangeAction $action, ChangeRequest $request)
    {
        $picture = $action->run($request->getModel(), $request);

        return new PictureResource($picture);
    }

    public function upload(UploadRequest $request): JsonResponse
    {
        /** @var UploadedFile $upload */
        $upload = $request->upload;
        $url = $upload->store('editor');

        $url = asset("/storage/$url");

        return $this->json(compact('url'));
    }
}
