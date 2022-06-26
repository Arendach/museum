<?php

namespace App\Repositories\Admin;

use App\Models\Model;
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

    final public function with(...$items): self
    {
        if (isset($items[0]) && is_array($items[0])) {
            $this->with = $items[0];
        } else {
            $this->with = $items;
        }

        return $this;
    }

    final public function findItem(): Builder|Model|null
    {
        return $this->getBuilder()
            ->with($this->with)
            ->where('id', Request::route('id'))
            ->first();
    }

    final public function findItemOrFail(): Builder|Model
    {
        $item = $this->findItem();

        abort_if(!$item, 404, translate('Помилка 404! Не знайдено!'));

        return $item;
    }

    final public function getModel(): string
    {
        return $this->model;
    }

    private function prepareRequest(): Builder
    {
        return $this->builder
            ->with($this->with)
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
