<?php

namespace App\Jobs;

use App\Models\Picture;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImageOptimize implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Picture $picture;

    public function __construct(Picture $picture)
    {
        $this->picture = $picture;
    }

    public function handle()
    {

    }
}
