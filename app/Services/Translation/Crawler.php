<?php

namespace App\Services\Translation;

use Symfony\Component\DomCrawler\Crawler as DomCrawler;
use Throwable;

/** @mixin Translation */
trait Crawler
{
    public $crawlerLevels = 5;

    public function crawlerTranslate(string $lang, string $content, $level = 1): ?string
    {
        $crawler = $this->getCrawler($content);

        $children = $crawler->filter('body')->children();

        $elements = $children->each(function (DomCrawler $node, $i) use ($lang, $level) {
            $stringLength = strlen($node->outerHtml());

            try {
                if ($level <= $this->crawlerLevels && $stringLength >= 5000) {
                    $childElements = $node->children()->each(function (DomCrawler $childNode, $i) use ($lang, $level) {
                        return $this->crawlerTranslate($lang, $childNode->outerHtml(), $level + 1);
                    });

                    $translated = implode('', $childElements);
                } elseif ($level > $this->crawlerLevels && $stringLength >= 5000) {
                    $translated = $node->outerHtml();
                } else {
                    $translated = $this->simpleTranslate($lang, $node->outerHtml());
                }

                return $translated;

            } catch (Throwable $exception) {

                return '';

            }
        });

        return implode('', $elements);
    }

    public function getCrawler(string $content): DomCrawler
    {
        return new DomCrawler($content);
    }
}
