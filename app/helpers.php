<?php

use App\Services\SettingService;

if (!function_exists('setting')) {
    function setting(string $key, string $type = 'string', mixed $default = null): mixed
    {
        return app(SettingService::class)->get($key, $type, $default);
    }
}
