<?php

namespace App\Http\Requests\Admin\Articles;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'slug'                 => [
                'required',
                Rule::unique('articles', 'slug')->ignore($this->route('id'))
            ],
            'title'                => 'required|max:255',
            'title_ru'             => 'nullable|max:255',
            'title_en'             => 'nullable|max:255',
            'short_description'    => 'nullable',
            'short_description_ru' => 'nullable',
            'short_description_en' => 'nullable',
            'description'          => 'nullable',
            'description_ru'       => 'nullable',
            'description_en'       => 'nullable',
            'tags'                 => 'nullable|array',
            'is_active'            => 'bool',
            'is_popular'           => 'bool',
            'seo'                  => 'nullable|array',
        ];
    }

    public function getData(): array
    {
        $is_active = $this->boolean('is_active', false);
        $is_popular = $this->boolean('is_popular', false);

        return array_merge(compact('is_active', 'is_popular'), $this->only([
            'title', 'title_ru', 'title_en',
            'short_description', 'short_description_ru', 'short_description_en',
            'description', 'description_ru', 'description_en',
        ]));
    }
}
