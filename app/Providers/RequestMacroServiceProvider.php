<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class RequestMacroServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Request::macro('getPaginationLimit', function (): int {
            return (int)$this->header('X-Pagination-Limit', config('api.pagination_limit'));
        });
    }
}
