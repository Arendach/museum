<?php

namespace App\Http\Requests\Admin\Countries;

use App\Http\Requests\ApiRequest;
use Str;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'          => 'required',
            'title_ru'       => 'nullable',
            'title_en'       => 'nullable',
            'description'    => 'nullable',
            'description_ru' => 'nullable',
            'description_en' => 'nullable',
            'code'           => 'required|string|unique:countries,code',
            'status'         => 'required',
            'slug'           => 'nullable|unique:countries,slug',
            'is_top'         => 'boolean',
        ];
    }

    public function getData(): array
    {
        $slug = $this->get('slug', Str::slug($this->get('title')));

        return array_merge(
            $this->validated(),
            compact('slug')
        );
    }
}
