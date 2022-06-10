<?php

namespace App\Http\Requests\Admin\Weapons;

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
            'slug'           => ['required', Rule::unique('weapons', 'slug')->ignore($this->route('weapon'))],
            'countries'      => 'nullable|array',
            'date'           => 'string|max:255',
        ];
    }

    public function getData(): array
    {
        return $this->only(
            'title', 'title_ru', 'title_en',
            'description', 'description_ru', 'description_en',
            'slug', 'date',
        );
    }

    public function getCountries(): array
    {
        return $this->get('countries', []);
    }
}
