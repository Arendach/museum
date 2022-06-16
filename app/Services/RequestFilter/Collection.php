<?php

namespace App\Services\RequestFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection as BaseCollection;

class Collection extends BaseCollection
{
    private Builder $builder;

    public function builder(Builder $builder): Collection
    {
        $this->builder = $builder;

        return $this;
    }

    public function apply(): void
    {
        $this->each(function (array $item) {
            $filter = new Filter($item);

            $filter->apply($this->builder);
        });
    }
}
