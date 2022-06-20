<?php

namespace App\Tasks\Pictures;

use App\Jobs\ImageOptimize;
use App\Models\Picture;

class OptimizationPictureTask
{
    public function run(Picture $picture): void
    {
        ImageOptimize::dispatch($picture);
    }
}
