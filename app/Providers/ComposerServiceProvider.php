<?php

namespace App\Providers;

use App\Http\Composers\AsideComposer;
use App\Http\Composers\QuoteComposer;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('parts.aside', AsideComposer::class);
        View::composer('parts.quote', QuoteComposer::class);
    }
}
