<?php

namespace App\Actions\Articles;

use App\Http\Requests\Admin\Articles\ChangePictureRequest;
use App\Models\Article;
use App\Models\Picture;
use App\Tasks\Pictures\OptimizationPictureTask;
use App\Tasks\Pictures\UploadPictureTask;
use Illuminate\Http\UploadedFile;

class ChangePictureAction
{
    public function run(Article $article, ChangePictureRequest $request): Picture
    {
        /** @var UploadedFile $picture */
        $picture = $request->picture;

        $alt = $picture->getClientOriginalName();
        $path = app(UploadPictureTask::class)->run($picture);

        $article->picture()->updateOrCreate(['is_main' => true], compact('path', 'alt'));

        app(OptimizationPictureTask::class)->run($article->picture);

        return $article->picture;
    }
}
