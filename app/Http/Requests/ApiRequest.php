<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function mlField(string $field, array|string $rules): array
    {
        $result = [];
        foreach (config('languages') as $item) {
            $result[$field . $item['postfix']] = $rules;
        }
        return $result;
    }
}
