<?php

namespace App\Actions\Search;

use App\Http\Requests\Search\SearchRequest;
use App\Models\Article;
use App\Models\Country;
use App\Models\People;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class SearchAction
{
    private array $instances = [
        Article::class,
        Country::class,
        People::class,
        Tag::class,
        Video::class,
    ];

    private SearchRequest $request;

    public function __construct(SearchRequest $request)
    {
        $this->request = $request;
    }

    public function run(): Collection
    {
        return collect($this->instances)
            ->map(function (string $instance) : Builder {
                return app($instance)->newQuery();
            })
            ->map(function (Builder $builder) {
                return $builder->search($this->request->get('query'))->get();
            })
            ->flatten(1)
            ->sortByDesc('created_at');
    }
}
