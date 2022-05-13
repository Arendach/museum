<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public function t(string $field): ?string
    {
        $locale = app()->getLocale();
        $field = $locale == 'ua' ? $field : "{$field}_$locale";

        return $this->$field;
    }
}
