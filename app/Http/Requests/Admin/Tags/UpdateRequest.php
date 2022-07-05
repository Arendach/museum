<?php

namespace App\Http\Requests\Admin\Tags;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'          => 'required|max:255',
            'title_ru'       => 'nullable|max:255',
            'title_en'       => 'nullable|max:255',
            'description'    => 'nullable',
            'description_ru' => 'nullable',
            'description_en' => 'nullable',
            'is_active'      => 'boolean',
            'is_top'         => 'boolean',
            'slug'           => ['required', Rule::unique('tags', 'slug')->ignore($this->route('id'))],
            'seo'            => 'array',
        ];
    }

    public function getData(): array
    {
        return $this->only(
            'title', 'title_ru', 'title_en',
            'description', 'description_ru', 'description_en',
            'is_top', 'is_active',
            'slug'
        );
    }
}
