<?php

namespace App\Http\Requests\Admin\Tags;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;
use Str;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'    => 'required|max:255',
            'title_ru' => 'nullable|max:255',
            'title_en' => 'nullable|max:255',
            'slug'     => ['required', Rule::unique('tags', 'slug')->ignore($this->route('id'))],
            'seo'      => 'array',
        ];
    }

    public function getData(): array
    {
        return $this->only('title', 'title_ru', 'title_en', 'slug');
    }
}
