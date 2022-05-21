<?php

namespace App\Services\Translation;

use Stichoza\GoogleTranslate\GoogleTranslate;

class Translation
{
    use Crawler;

    public GoogleTranslate $translationService;

    public function __construct()
    {
        $this->translationService = new GoogleTranslate('', 'uk');
    }

    public function translate(string $lang, string $content): ?string
    {
        if ($lang == 'ua'){
            return $content;
        }

        if (strlen($content) <= 4999) {
            return $this->simpleTranslate($lang, $content);
        } else {
            return $this->crawlerTranslate($lang, $content);
        }
    }

    private function simpleTranslate(string $lang, string $content): ?string
    {
        return $this->translationService
            ->setSource('uk')
            ->setTarget($lang)
            ->translate($content);
    }
}
