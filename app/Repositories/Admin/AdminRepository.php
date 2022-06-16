<?php

namespace App\Repositories\Admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Request;

abstract class AdminRepository
{
    protected string $model;
    protected array $with = [];
    private Builder $builder;

    public function __construct()
    {
        $this->builder = $this->getBuilder();

        $this->applyRequestFilters();
    }

    final public function getItems(): Collection
    {
        return $this->prepareRequest()->get();
    }

    final public function getItemsPaginate(): LengthAwarePaginator
    {
        return $this->prepareRequest()->paginate(
            Request::getPaginationLimit()
        );
    }

    private function prepareRequest(): Builder
    {
        return $this->builder->with($this->with)
            ->orderBy(
                Request::getOrderField(),
                Request::getOrderDirection(),
            );
    }

    private function getBuilder(): Builder
    {
        return (new $this->model)->newQuery();
    }

    private function applyRequestFilters(): void
    {
        Request::filters()
            ->builder($this->builder)
            ->apply();
    }
}
