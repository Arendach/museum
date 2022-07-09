<?php

namespace App\Http\Requests\Admin\Pages;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'slug'                 => [
                'required',
                Rule::unique('pages', 'slug')->ignore($this->route('id'))
            ],
            'title'                => 'required|max:255',
            'title_ru'             => 'nullable|max:255',
            'title_en'             => 'nullable|max:255',
            'description'          => 'nullable',
            'description_ru'       => 'nullable',
            'description_en'       => 'nullable',
            'is_active'            => 'bool',
            'seo'                  => 'nullable|array',
        ];
    }

    public function getData(): array
    {
        $is_active = $this->boolean('is_active', false);

        return array_merge(compact('is_active'), $this->only([
            'slug',
            'title', 'title_ru', 'title_en',
            'description', 'description_ru', 'description_en',
        ]));
    }
}
