<?php

namespace App\Http\Requests\Admin\Weapons;

use App\Http\Requests\ApiRequest;
use Str;

class StoreRequest extends ApiRequest
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
            'slug'           => 'nullable|unique:weapons,slug',
            'countries'      => 'nullable|array',
            'date'           => 'string|max:255',
        ];
    }

    public function getData(): array
    {
        $slug = $this->get('slug', Str::slug($this->get('title')));

        return array_merge(compact('slug'), $this->only(
            'title', 'title_ru', 'title_en',
            'description', 'description_ru', 'description_en',
            'date',
        ));
    }

    public function getCountries(): array
    {
        return $this->get('countries', []);
    }
}
