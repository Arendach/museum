<?php

namespace App\Actions\Pictures;

use App\Http\Requests\Admin\Pictures\ChangeRequest;
use App\Models\Model;
use App\Models\Picture;
use App\Tasks\Pictures\OptimizationPictureTask;
use App\Tasks\Pictures\UploadPictureTask;
use Illuminate\Http\UploadedFile;

class ChangeAction
{
    public function run(Model $model, ChangeRequest $request): Picture
    {
        /** @var UploadedFile $picture */
        $picture = $request->picture;

        $alt = $picture->getClientOriginalName();
        $path = app(UploadPictureTask::class)->run($picture);

        $model->picture()->updateOrCreate(['is_main' => true], compact('path', 'alt'));

        app(OptimizationPictureTask::class)->run($model->picture);

        return $model->picture;
    }
}
