<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Collection;
use Str;
use Cache;

class SettingService
{
    private Collection $storage;

    public function __construct()
    {
        $this->load();
    }

    private function load(): void
    {
        $this->storage = Cache::rememberForever('settings', function () {
            return Setting::all();
        });
    }

    public function get(string $key, string $type = 'string', mixed $default = null): mixed
    {
        $slug = Str::slug($key);

        if ($this->storage->where('slug', $slug)->count()) {
            return $this->storage->where('slug', $slug)->first()->t('content');
        }

        $this->makeSetting($key, $type, $default);

        return $default;
    }

    private function makeSetting(string $key, string $type, mixed $default): void
    {
        Setting::create([
            'title'      => $key,
            'slug'       => Str::slug($key),
            'type'       => $type,
            'content'    => $default,
            'content_ru' => $default,
            'content_en' => $default,
        ]);

        Cache::forget('settings');
    }
}
