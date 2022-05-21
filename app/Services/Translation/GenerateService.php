<?php

namespace App\Services\Translation;

use App\Models\Phrase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class GenerateService
{
    private string$language;
    private Collection|null $storage = null;

    public function __construct(string $language)
    {
        $this->language = $language;

        $this->load();
    }

    private function load(): void
    {
        if ($this->storage === null) {
            $this->storage = Phrase::with(['translations' => function (HasMany $relation) {
                $relation->where('lang', $this->language);
            }])->get();
        }
    }

    private function mapArray(): array
    {
        return $this->storage->mapWithKeys(function (Phrase $phrase) {
            $translation = null;
            if ($phrase->translations && count($phrase->translations) > 0) {
                $translation = $phrase->translations->first()->content;
            }

            return [$phrase->phrase => $translation];
        })->toArray();
    }

    public function run(): array
    {
        return $this->mapArray();
    }
}
