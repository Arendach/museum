<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Symfony\Component\DomCrawler\Crawler;

abstract class Model extends BaseModel
{
    protected $guarded = [];
    public $timestamps = false;

    public function t(string $field): ?string
    {
        $locale = app()->getLocale();
        $fieldLocal = $locale == 'ua' ? $field : "{$field}_$locale";

        $content = $this->$fieldLocal;

        if (!$content) {
            return $this->$field;
        }

        return $content;
    }

    public function firstParagraph(string $field): ?string
    {
        $content = $this->t($field);

        try {
            return (new Crawler($content))->filter('p')->first()->outerHtml();
        } catch (\Throwable $exception) {
            return null;
        }
    }
}
