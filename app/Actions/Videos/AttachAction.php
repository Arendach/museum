<?php

namespace App\Actions\Videos;

use App\Models\Contracts\HasVideoContract;
use App\Models\Video;

class AttachAction
{
    public function run(HasVideoContract $model, Video $video): void
    {
        $model->videos()->attach($video);
    }

}
