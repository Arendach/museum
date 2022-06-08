<?php

namespace App\Tasks\Pictures;

use App\Models\Picture;

class OptimizationPictureTask
{
    public function run(Picture $picture): void
    {
        // todo: підключити пакет від spatie. В фоні запускати процес оптимізації
    }
}
