<?php

use App\Services\SettingService;
use App\Services\Translation\DictionaryService;

if (!function_exists('setting')) {
    function setting(string $key, string $type = 'string', mixed $default = null): mixed
    {
        return app(SettingService::class)->get($key, $type, $default);
    }
}

if (!function_exists('translate')) {
    function translate(string $phrase, array $replacements = []): ?string
    {
        return app(DictionaryService::class)->get($phrase, $replacements);
    }
}

if (!function_exists('removeEmoji')) {
    function removeEmoji(string $string): string
    {
        // Match Emoticons
        $regex_emoticons = '/[\x{1F600}-\x{1F64F}]/u';
        $clear_string = preg_replace($regex_emoticons, '', $string);

        // Match Miscellaneous Symbols and Pictographs
        $regex_symbols = '/[\x{1F300}-\x{1F5FF}]/u';
        $clear_string = preg_replace($regex_symbols, '', $clear_string);

        // Match Transport And Map Symbols
        $regex_transport = '/[\x{1F680}-\x{1F6FF}]/u';
        $clear_string = preg_replace($regex_transport, '', $clear_string);

        // Match Miscellaneous Symbols
        $regex_misc = '/[\x{2600}-\x{26FF}]/u';
        $clear_string = preg_replace($regex_misc, '', $clear_string);

        // Match Dingbats
        $regex_dingbats = '/[\x{2700}-\x{27BF}]/u';
        return preg_replace($regex_dingbats, '', $clear_string);
    }
}
