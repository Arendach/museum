<?php

namespace App\Services\Translation;

use App\Models\Phrase;
use Cache;

class DictionaryService
{
    private array|null $dictionary;

    public function __construct()
    {
        $this->dictionary = $this->loadDictionary();
    }

    public function get(string $phrase, array $replacements = []): ?string
    {
        $phrase = $this->getPhrase($phrase);

        return $this->replacement($phrase, $replacements);
    }

    private function loadDictionary(): ?array
    {
        $locale = app()->getLocale();

        return Cache::rememberForever("translations_$locale", function () {
            $generateService = new GenerateService(app()->getLocale());

            return $this->arrayChangeKeyCaseMb(
                $generateService->run()
            );
        });
    }

    private function getDictionary(): ?array
    {
        return $this->dictionary;
    }

    private function replacement(string $phrase, array $replacements = []): string
    {
        foreach ($replacements as $key => $replacement) {
            $phrase = str_replace($key, $replacement, $phrase);
        }

        return $phrase;
    }

    private function getPhrase(string $phrase): ?string
    {
        $dictionary = $this->getDictionary();

        if ($this->hasTranslation($phrase, $dictionary)) {
            return $this->getTranslation($phrase, $dictionary);
        }

        $this->makeTranslation($phrase);

        return $phrase;
    }

    private function makeTranslation(string $phrase): void
    {
        $translationPhrase = Phrase::firstOrCreate(['phrase' => $phrase]);

        $this->makeTranslationItem('ua', $phrase, $translationPhrase->id);
        $this->makeTranslationItem('ru', $phrase, $translationPhrase->id);
        $this->makeTranslationItem('en', $phrase, $translationPhrase->id);
    }

    private function makeTranslationItem($lang, $phrase, $phraseId): void
    {
        $translate = app(Translation::class)->translate($lang, $phrase);

        $translate = trim($translate);

        \App\Models\Translation::updateOrCreate([
            'phrase_id' => $phraseId,
            'lang'      => $lang,
        ], [
            'content' => $translate
        ]);
    }

    private function arrayChangeKeyCaseMb(array $array): array
    {
        $result = [];
        foreach ($array as $key => $item) {
            $result[$this->prepareKey($key)] = $item;
        }

        return $result;
    }

    private function hasTranslation(string $phrase, array $dictionary): bool
    {
        $key = $this->prepareKey($phrase);
        $keys = array_keys($dictionary);

        return in_array($key, $keys) && !is_null($dictionary[$key]);
    }

    private function getTranslation(string $phrase, array $dictionary): string
    {
        $key = $this->prepareKey($phrase);

        return (string)$dictionary[$key];
    }

    private function prepareKey(string $phrase): ?string
    {
        $phrase = mb_strtolower($phrase);
        $phrase = removeEmoji($phrase);
        return trim($phrase);
    }
}
