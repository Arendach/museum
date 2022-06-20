<?php

namespace App\Console\Commands;

use App\Actions\Pictures\OptimizeAction;
use App\Models\Picture;
use Illuminate\Console\Command;

class ImageOptimize extends Command
{
    protected $signature = 'image:optimize';

    protected $description = 'Optimization images in to pictures table';

    public function handle(): void
    {
        Picture::all()->each(fn (Picture $picture) => app(OptimizeAction::class)->run($picture));
    }
}
