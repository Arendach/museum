<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
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
}
