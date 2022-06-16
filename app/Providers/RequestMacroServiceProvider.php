<?php

namespace App\Providers;

use App\Services\RequestFilter\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class RequestMacroServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Request::macro('getPaginationLimit', function (): int {
            return (int)$this->header('X-Pagination-Limit', config('api.pagination_limit'));
        });

        Request::macro('getOrderDirection', function (): string {
            return $this->header('X-Order-Direction', config('api.order_direction'));
        });

        Request::macro('getOrderField', function (): string {
            return $this->header('X-Order-Field', config('api.order_field'));
        });

        Request::macro('filters', function (): Collection {
            return new Collection($this->get('filters', []));
        });
    }
}
