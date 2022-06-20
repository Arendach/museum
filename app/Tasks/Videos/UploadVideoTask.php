<?php

namespace App\Tasks\Videos;

use Illuminate\Http\UploadedFile;

class UploadVideoTask
{
    public function run(UploadedFile $video): string
    {
        return 'storage/' . $video->store('videos');
    }
}
