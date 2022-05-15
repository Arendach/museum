<?php

namespace App\Http\Requests\Admin\Articles;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'                => 'required',
            'title_ru'             => 'required',
            'title_en'             => 'required',
            'short_description'    => 'nullable',
            'short_description_ru' => 'nullable',
            'short_description_en' => 'nullable',
            'description'          => 'nullable',
            'description_ru'       => 'nullable',
            'description_en'       => 'nullable',
            'tags'                 => ['nullable', 'array'],
            'is_active'            => 'bool',
        ];
    }

    public function getTags(): array
    {
        return $this->get('tags') ?: [];
    }

    public function getData(): array
    {
        return $this->only([
            'title', 'title_ru', 'title_en',
            'short_description', 'short_description_ru', 'short_description_en',
            'description', 'description_ru', 'description_en',
            'is_active'
        ]);
    }
}
