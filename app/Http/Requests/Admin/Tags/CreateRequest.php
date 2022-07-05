<?php

namespace App\Http\Requests\Admin\Tags;

use App\Http\Requests\ApiRequest;
use Str;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'slug'           => 'nullable',
            'title'          => 'required',
            'title_ru'       => 'nullable',
            'title_en'       => 'nullable',
            'description'    => 'nullable',
            'description_ru' => 'nullable',
            'description_en' => 'nullable',
            'is_top'         => 'boolean',
            'is_active'      => 'boolean',
        ];
    }

    public function getData(): array
    {
        $slug = $this->get('slug', Str::slug($this->get('title')));

        return array_merge(compact('slug'), $this->only(
            'title', 'title_ru', 'title_en',
            'description', 'description_ru', 'description_en',
            'is_active', 'is_top',
        ));
    }
}
