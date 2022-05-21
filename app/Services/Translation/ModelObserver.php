<?php

namespace App\Services\Translation;

use App\Models\Phrase;
use App\Models\Translation as TranslationModel;
use Cache;
use Artisan;

class ModelObserver
{
    public function updated(Phrase|TranslationModel $model): void
    {
        $this->clearCache();
    }

    public function created(Phrase|TranslationModel $model): void
    {
        $this->clearCache();
    }

    public function deleted(Phrase|TranslationModel $model): void
    {
        $this->clearCache();
    }

    private function clearCache(): void
    {
        Cache::forget('translations_key');
        Cache::forget('translations_ua');
        Cache::forget('translations_ru');
        Cache::forget('translations_en');
        Artisan::call('generate:translations');
    }
}
