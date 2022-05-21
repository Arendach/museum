<?php

namespace App\Providers;

use App\Models\Phrase;
use App\Models\Translation;
use App\Services\Translation\ModelObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Translation::observe(ModelObserver::class);
        Phrase::observe(ModelObserver::class);
    }
}
