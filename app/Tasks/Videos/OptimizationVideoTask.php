<?php

namespace App\Tasks\Videos;

use App\Models\Video;

class OptimizationVideoTask
{
    public function run(Video $video): void
    {
        // todo: підключити пакет від spatie. В фоні запускати процес оптимізації
    }
}
