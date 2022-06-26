<?php

namespace App\Models\Traits;

use App\Models\Model;
use App\Models\Seo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/** @mixin Model */
trait HasSeo
{
    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'model');
    }

    public function seoTitle(): ?string
    {
        return $this->seo?->t('title') ?? $this->t('title');
    }

    public function seoDescription(): ?string
    {
        return $this->seo?->t('description') ?? null;
    }

    public function seoKeywords(): ?string
    {
        return $this->seo?->t('keywords') ?? null;
    }

    public function seoH1(): ?string
    {
        return $this->seo?->t('h1') ?? $this->t('title');
    }

    public function seoIndex(): string
    {
        $index = $this->seo?->is_index ?? true;

        return $index ? 'index' : 'noindex';
    }

    public function seoFollow(): string
    {
        $index = $this->seo?->is_follow ?? true;

        return $index ? 'follow' : 'nofollow';
    }

    public function updateSeo(array $data): void
    {
        $this->seo()->updateOrCreate([], $data);
    }
}
