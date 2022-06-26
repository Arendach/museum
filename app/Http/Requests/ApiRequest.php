<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class ApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getSeo(): array
    {
        return $this->get('seo', []);
    }

    public function getTags(): array
    {
        return $this->get('tags') ?: [];
    }

    public function getData(): array
    {
        return $this->validated();
    }
}
