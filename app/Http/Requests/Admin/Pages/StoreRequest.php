<?php

namespace App\Http\Requests\Admin\Pages;

use App\Http\Requests\ApiRequest;
use Str;

class StoreRequest extends ApiRequest
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
            'is_active'      => 'bool',
        ];
    }

    public function getData(): array
    {
        $slug = $this->get('slug', Str::slug($this->get('title')));
        $is_active = $this->boolean('is_active', false);

        return array_merge(compact('slug', 'is_active'), $this->only([
            'title', 'title_ru', 'title_en',
            'description', 'description_ru', 'description_en'
        ]));
    }
}
