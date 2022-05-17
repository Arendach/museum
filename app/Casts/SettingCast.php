<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class SettingCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        if ($model->type == 'json'){
            return json_encode($value);
        }

        return $value;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if ($model->type == 'integer'){
            return (int)$value;
        }

        if ($model->type == 'json') {
            return json_decode($value);
        }

        return $value;
    }
}
