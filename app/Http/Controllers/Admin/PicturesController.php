<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Pictures\ChangeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pictures\ChangeRequest;
use App\Http\Resources\Admin\PictureResource;

class PicturesController extends Controller
{
    public function change(ChangeAction $action, ChangeRequest $request)
    {
        $picture = $action->run($request->getModel(), $request);

        return new PictureResource($picture);
    }
}
