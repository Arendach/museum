<?php

namespace App\Http\Composers;

use App\Models\Article;
use App\Models\Country;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class AsideComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'tags'            => $this->getTags(),
            'countries'       => $this->getCountries(),
            'popularArticles' => $this->getPopularArticles(),
        ]);
    }

    public function getTags(): Collection
    {
        return Tag::where('is_active', true)
            ->where('is_top', true)
            ->get();
    }

    public function getCountries(): Collection
    {
        return Country::where('is_top', true)->get();
    }

    public function getPopularArticles(): Collection
    {
        return Article::where('is_popular', true)
            ->where('is_active', true)
            ->orderByDesc('id')
            ->limit(3)
            ->get();
    }
}
