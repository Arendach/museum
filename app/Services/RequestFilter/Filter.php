<?php

namespace App\Services\RequestFilter;

use Illuminate\Database\Eloquent\Builder;

class Filter
{
    private Builder $builder;
    private string $field;
    private string $term;
    private string $glue;
    private null|int|array|string $value;

    public function __construct(array $item)
    {
        $this->field = $item['field'];
        $this->term = $item['term'] ?? 'is';
        $this->glue = $item['glue'] ?? 'and';
        $this->value = $item['value'] ?? null;
    }

    public function apply(Builder $builder): void
    {
        $this->builder = $builder;

        $builder
            ->when($this->term('is'), fn() => $this->resolveIs())
            ->when($this->term('not'), fn() => $this->resolveNot())
            ->when($this->term('in'), fn() => $this->resolveIn())
            ->when($this->term('not in'), fn() => $this->resolveNotIn())
            ->when($this->term('like'), fn() => $this->resolveLike());
    }

    private function resolveIs(): void
    {
        $this->builder->when(
            $this->glue === 'and',
            fn(Builder $builder) => $builder->where($this->field, '=', $this->getValue()),
            fn(Builder $builder) => $builder->orWhere($this->field, '=', $this->getValue())
        );
    }

    private function resolveNot(): void
    {
        $this->builder->when(
            $this->glue === 'and',
            fn(Builder $builder) => $builder->where($this->field, '!=', $this->getValue()),
            fn(Builder $builder) => $builder->orWhere($this->field, '!=', $this->getValue()),
        );
    }

    private function resolveIn(): void
    {
        $this->builder->when(
            $this->glue === 'and',
            fn(Builder $builder) => $builder->whereIn($this->field, $this->getValue()),
            fn(Builder $builder) => $builder->orWhereIn($this->field, $this->getValue()),
        );
    }

    private function resolveNotIn(): void
    {
        $this->builder->when(
            $this->glue === 'and',
            fn(Builder $builder) => $builder->whereNotIn($this->field, $this->getValue()),
            fn(Builder $builder) => $builder->orWhereNotIn($this->field, $this->getValue()),
        );
    }

    private function resolveLike(): void
    {
        $this->builder->when(
            $this->glue === 'and',
            fn(Builder $builder) => $builder->where($this->field, 'like', '%' . $this->getValue() . '%'),
            fn(Builder $builder) => $builder->orWhere($this->field, 'like', '%' . $this->getValue() . '%'),
        );
    }

    public function term(string $term): bool
    {
        return $this->term === $term;
    }

    public function getValue(): null|string|array|int
    {
        if (($this->term('in') || $this->term('notIn')) && is_array($this->value)) {
            return $this->value;
        }

        if (($this->term('in') || $this->term('notIn')) && is_string($this->value)) {
            return explode(',', $this->value);
        }

        return $this->value;
    }
}
