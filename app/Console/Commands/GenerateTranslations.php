<?php

namespace App\Console\Commands;

use App\Services\Translation\GenerateService;
use Illuminate\Console\Command;

class GenerateTranslations extends Command
{
    protected $signature = 'generate:translations';

    protected $description = 'Generate javascript files for translations...';

    private array $languages = ['ua', 'ru', 'en'];

    public function handle(): void
    {
        $this->info('Start generating');
        foreach ($this->languages as $language) {
            $generateService = new GenerateService($language);

            $translations = $generateService->run();

            $this->makeAssetFile($language, $translations);
            $this->info("Generated for $language language");
        }
        $this->info('Generating finish');
    }

    private function makeAssetFile(string $language, array $translations): void
    {
        $path = public_path("translations/$language.js");
        $content = $this->getContent($translations);

        file_put_contents($path, $content);
    }

    private function getContent(array $translations): string
    {
        $templateContent = file_get_contents(resource_path('stubs/translations.js'));

        if (config('app.debug')) {
            $content = json_encode($translations, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        } else {
            $content = json_encode($translations, JSON_UNESCAPED_UNICODE);
        }

        return str_replace('{translations}', $content, $templateContent);
    }
}
