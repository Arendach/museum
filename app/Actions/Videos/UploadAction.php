<?php

namespace App\Actions\Videos;

use App\Http\Requests\Admin\Videos\UploadRequest;
use App\Models\Model;
use App\Models\Video;
use App\Tasks\Videos\OptimizationVideoTask;
use App\Tasks\Videos\UploadVideoTask;

class UploadAction
{
    public function run(?Model $model, UploadRequest $request): Video
    {
        $video = $request->getVideo();

        $path = app(UploadVideoTask::class)->run($video);

        $video = $this->makeVideo($path, $request->getData());

        $this->attachModel($video, $model);

        app(OptimizationVideoTask::class)->run($video);

        return $video;
    }

    private function makeVideo($path, $data): Video
    {
        $data['path'] = $path;

        return Video::create($data);
    }

    private function attachModel(Video $video, ?Model $model = null): void
    {
        if (is_null($model)) return;

        $model->videos()->attach($video);
    }
}
